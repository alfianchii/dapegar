<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\Users\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\MasterUserRequest;
use App\Models\{MasterAgama, MasterEselon, MasterGolonganPangkat, MasterJabatan, MasterLokasiKerja, MasterUnitKerja, User};
use App\Traits\Exportable;
use App\Traits\Helpers\Passwordable;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\{Hash, Storage, Validator};

class MasterUserController extends Controller
{
    use Passwordable, Exportable;



    public function userRequest()
    {
        return new MasterUserRequest();
    }

    public function getRules()
    {
        return $this->userRequest()->rules();
    }

    public function getMessages()
    {
        return $this->userRequest()->messages();
    }

    public function updateUserRules(array $rules, User $theUser, array $data)
    {
        unset($rules["password"], $rules["password_confirmation"]);
        if (array_key_exists("email", $data))
            if ($data["email"] === $theUser->email) unset($rules["email"]);
        if (array_key_exists("telepon", $data))
            if ($data["telepon"] === $theUser->telepon) unset($rules["telepon"]);
        if (array_key_exists("nip", $data))
            if ($data["nip"] === $theUser->nip) unset($rules["nip"]);
        if (array_key_exists("npwp", $data))
            if ($data["npwp"] === $theUser->npwp) unset($rules["npwp"]);

        return $rules;
    }



    public function index()
    {
        $role = $this->userRole;
        if ($role === "superadmin") {
            $users = User::whereNot("id_user", $this->userData->id_user)
                ->latest()
                ->get();

            $viewVariables = [
                "title" => "Pengguna",
                "users" => $users,
            ];
            return view("pages.dashboard.actors.superadmin.users.all", $viewVariables);
        };

        return view("errors.403");
    }

    public function register()
    {
        $role = $this->userRole;
        if ($role === "superadmin") {
            $golonganPangkat = MasterGolonganPangkat::orderBy("kode_golongan", "asc")->orderBy("kode_ruang", "asc")->get();
            $eselon = MasterEselon::orderBy("nama_eselon", "asc")->get();
            $jabatan = MasterJabatan::all();
            $lokasiKerja = MasterLokasiKerja::all();
            $unitKerja = MasterUnitKerja::all();
            $agama = MasterAgama::all();

            $viewVariables = [
                "title" => "Registrasi Pengguna",
                "golonganPangkat" => $golonganPangkat,
                "eselon" => $eselon,
                "jabatan" => $jabatan,
                "lokasiKerja" => $lokasiKerja,
                "unitKerja" => $unitKerja,
                "agama" => $agama,
            ];
            return view("pages.dashboard.actors.superadmin.users.register", $viewVariables);
        };

        return view("errors.403");
    }

    public function store(MasterUserRequest $request)
    {
        // Data processing
        $credentials = $request->validated();

        $role = $this->userRole;
        if ($role === "superadmin") {
            $credentials["password"] = Hash::make($credentials["password"]);
            $credentials = $this->imageCropping(null, $credentials, "foto_profil", "user/profile-pictures");
            $credentials["created_by"] = $this->userData->id_user;

            $theUser = User::create($credentials);

            return redirect(self::DASHBOARD_URL . "/users/details/$theUser->id_user")->withSuccess("Pengguna $theUser->nama_lengkap berhasil diregistrasi!");
        };

        return view("errors.403");
    }

    public function show(string $idUser)
    {
        $theUser = User::firstWhere("id_user", $idUser);
        if (!$theUser) return view("errors.404");

        $role = $this->userRole;
        if ($role === "superadmin") {
            try {
                if ($this->userData->id_user === $theUser->id_user) throw new \Exception("Ini merupakan akun kamu.");
            } catch (\Exception $e) {
                return redirect(self::DASHBOARD_URL)->withErrors($e->getMessage());
            }

            $viewVariables = [
                "title" => "Pengguna $theUser->nama_lengkap",
                "theUser" => $theUser,
            ];
            return view("pages.dashboard.actors.superadmin.users.show", $viewVariables);
        };

        return view("errors.403");
    }

    public function edit(string $idUser)
    {
        // Data processing
        $theUser = User::firstWhere("id_user", $idUser);
        if (!$theUser) return view("errors.404");

        $role = $this->userRole;
        if ($role === "superadmin") {
            // ---------------------------------
            // Rules
            if ($theUser->role !== "superadmin") {
                $golonganPangkat = MasterGolonganPangkat::orderBy("kode_golongan", "asc")->orderBy("kode_ruang", "asc")->get();
                $eselon = MasterEselon::orderBy("nama_eselon", "asc")->get();
                $jabatan = MasterJabatan::all();
                $lokasiKerja = MasterLokasiKerja::all();
                $unitKerja = MasterUnitKerja::all();
                $agama = MasterAgama::all();

                $viewVariables = [
                    "title" => "Edit Pengguna",
                    "theUser" => $theUser,
                    "golonganPangkat" => $golonganPangkat,
                    "eselon" => $eselon,
                    "jabatan" => $jabatan,
                    "lokasiKerja" => $lokasiKerja,
                    "unitKerja" => $unitKerja,
                    "agama" => $agama,
                ];
                return view("pages.dashboard.actors.superadmin.users.edit", $viewVariables);
            }

            return redirect(self::HOME_URL)
                ->withErrors('Kamu tidak bisa menyunting akun superadmin.');
        };

        return view("errors.403");
    }

    public function update(Request $request, string $idUser)
    {
        // Data processing
        $data = $request->all();
        $theUser = User::firstWhere("id_user", $idUser);
        if (!$theUser) return view("errors.404");

        $role = $this->userRole;
        if ($role === "superadmin") {
            // ---------------------------------
            // Rules
            if ($theUser->role !== "superadmin") {
                $rules = $this->updateUserRules($this->getRules(), $theUser, $data);

                $credentials = Validator::make($data, $rules, $this->getMessages())->validate();
                $credentials = $this->imageCropping($theUser->foto_profil, $credentials, "foto_profil", "user/profile-pictures");

                return $this->modify($theUser, $credentials, $this->userData->id_user, "pengguna $theUser->nama_lengkap", self::DASHBOARD_URL . "/users/details/$theUser->id_user");
            }

            return redirect(self::HOME_URL)
                ->withErrors('Kamu tidak bisa menyunting akun superadmin.');
        };

        return view("errors.403");
    }

    public function destroy(string $idUser)
    {
        // Data processing
        $theUser = User::firstWhere("id_user", $idUser);
        if (!$theUser) return $this->responseJsonMessage("The data you are looking not found.", 404);

        $role = $this->userRole;
        if ($role === "superadmin") {
            try {
                // ---------------------------------
                // Rules
                if ($theUser->role !== "superadmin") {
                    if (!$theUser->delete()) throw new \Exception("Error removing the user.");
                    $theUser->update(["updated_by" => $this->userData->id_user]);
                } else return $this->responseJsonMessage('Kamu tidak bisa menghapus akun superadmin.', 422);
            } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
                return $this->responseJsonMessage($e->getMessage(), 500);
            } catch (\Exception $e) {
                return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
            }

            return $this->responseJsonMessage("Pengguna berhasil dihapus.");
        };

        return $this->responseJsonMessage("You are unauthorized to do this action.", 422);
    }

    public function export(Request $request)
    {
        // Data processing
        $data = $request->all();
        $validator = $this->exportValidates($data);
        if ($validator->fails()) return view("errors.403");
        $creds = $validator->validate();

        $fileName = $this->getExportFileName($creds["type"]);
        $writterType = $this->getWritterType($creds["type"]);

        $role = $this->userRole;
        if ($role === "superadmin") {
            if ($creds["table"] === "all-of-users")
                return $this->exports((new UsersExport), $fileName, $writterType);

            return view("errors.404");
        };

        return view("errors.403");
    }



    public function profile()
    {
        $role = $this->userRole;
        if ($role) {
            $viewVariables = [
                "title" => "Profil",
            ];
            return view("pages.dashboard.actors.custom.accounts.profile", $viewVariables);
        }

        return view("errors.403");
    }

    public function settings()
    {
        $role = $this->userRole;
        if ($role === "superadmin") {
            $golonganPangkat = MasterGolonganPangkat::orderBy("kode_golongan", "asc")->orderBy("kode_ruang", "asc")->get();
            $eselon = MasterEselon::orderBy("nama_eselon", "asc")->get();
            $jabatan = MasterJabatan::all();
            $lokasiKerja = MasterLokasiKerja::all();
            $unitKerja = MasterUnitKerja::all();
            $agama = MasterAgama::all();

            $viewVariables = [
                "title" => "Pengaturan",
                "golonganPangkat" => $golonganPangkat,
                "eselon" => $eselon,
                "jabatan" => $jabatan,
                "lokasiKerja" => $lokasiKerja,
                "unitKerja" => $unitKerja,
                "agama" => $agama,
            ];
            return view("pages.dashboard.actors.superadmin.accounts.setting", $viewVariables);
        };

        if ($role === "officer") {
            $agama = MasterAgama::all();

            $viewVariables = [
                "title" => "Pengaturan",
                "agama" => $agama,
            ];
            return view("pages.dashboard.actors.officer.accounts.setting", $viewVariables);
        };

        return view("errors.403");
    }

    public function settingsUpdate(Request $request, string $idUser)
    {
        // Data processing
        $data = $request->all();
        $user = User::firstWhere("id_user", $idUser);
        if (!$user) return view("errors.404");

        try {
            if ($user->id_user !== $this->userData->id_user) throw new \Exception("Akun tidak ditemukan.");
        } catch (\Exception $e) {
            return redirect(self::DASHBOARD_URL)->withErrors($e->getMessage());
        }

        $role = $this->userRole;
        if ($role === "superadmin") {
            $rules = $this->updateUserRules($this->getRules(), $user, $data);
            unset($rules["role"]);
            $credentials = Validator::make($data, $rules, $this->getMessages())->validate();
            $credentials = $this->imageCropping($user->foto_profil, $credentials, "foto_profil", "user/profile-pictures");

            return $this->modify($user, $credentials, $this->userData->id_user, "akun kamu", self::DASHBOARD_URL . "/users/account");
        };

        if ($role === "officer") {
            $rules = $this->updateUserRules($this->getRules(), $user, $data);
            unset(
                $rules["role"],
                $rules["nip"],
                $rules["tempat_lahir"],
                $rules["tanggal_lahir"],
                $rules["gender"],
                $rules["id_golongan_pangkat"],
                $rules["id_eselon"],
                $rules["id_jabatan"],
                $rules["id_lokasi_kerja"],
                $rules["id_unit_kerja"],
            );

            $credentials = Validator::make($data, $rules, $this->getMessages())->validate();
            $credentials = $this->imageCropping($user->foto_profil, $credentials, "foto_profil", "user/profile-pictures");

            return $this->modify($user, $credentials, $this->userData->id_user, "akun kamu", self::DASHBOARD_URL . "/users/account");
        }

        return view("errors.403");
    }

    public function changePassword()
    {
        $role = $this->userRole;
        if ($role) {
            $viewVariables = [
                "title" => "Ganti Password",
            ];
            return view("pages.dashboard.actors.custom.accounts.change-password", $viewVariables);
        }

        return view("errors.403");
    }

    public function changePasswordUpdate(Request $request)
    {
        // Data processing
        $data = $request->all();

        $role = $this->userRole;
        if ($role) {
            $arr = $this->getRulesMessagesPassword();
            $credentials = Validator::make($data, $arr["rules"], $arr["messages"])->validate();

            try {
                $this->validateChangePassword($this->userData, $credentials["current_password"], $credentials["new_password"]);
            } catch (\Exception $e) {
                return redirect(self::DASHBOARD_URL . "/users/account/password")->withErrors($e->getMessage());
            }

            return $this->alterYourPassword($this->userData, $credentials, self::DASHBOARD_URL . "/users/account");
        }

        return view("errors.403");
    }

    public function destroyProfilePicture(string $idUser)
    {
        // Data processing
        $theUser = User::firstWhere("id_user", $idUser);
        if (!$theUser->foto_profil) return $this->responseJsonMessage("The data you are looking not found.", 404);

        $role = $this->userRole;
        if ($role) {
            try {
                if ($theUser->id_user === $this->userData->id_user) throw new \Exception("Akun tidak ditemukan.");
                if (!Storage::delete($theUser->foto_profil)) throw new \Exception('Error deleting profile picture.');
                $theUser->update(["foto_profil" => null, "updated_by" => $theUser->id_user]);
            } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
                return $this->responseJsonMessage($e->getMessage(), 500);
            } catch (\Throwable $e) {
                return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
            }

            return $this->responseJsonMessage("Foto profil berhasil dihapus.");
        }

        return $this->responseJsonMessage("You are unauthorized to do this action.", 403);
    }

    public function destroyYourProfilePicture(string $idUser)
    {
        // Data processing
        $yourAccount = User::firstWhere("id_user", $idUser);
        if (!$yourAccount->foto_profil) return $this->responseJsonMessage("The data you are looking not found.", 404);

        $role = $this->userRole;
        if ($role) {
            try {
                if ($yourAccount->id_user !== $this->userData->id_user) throw new \Exception("Akun tidak ditemukan.");
                if (!Storage::delete($yourAccount->foto_profil)) throw new \Exception('Error deleting profile picture.');
                $yourAccount->update(["foto_profil" => null, "updated_by" => $yourAccount->id_user]);
            } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
                return $this->responseJsonMessage($e->getMessage(), 500);
            } catch (\Throwable $e) {
                return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
            }

            return $this->responseJsonMessage("Foto profil kamu berhasil dihapus.");
        }

        return $this->responseJsonMessage("You are unauthorized to do this action.", 403);
    }

    public function mutateUserPassword(Request $request, string $idUser)
    {
        // Data processing
        $data = $request->all();
        $theUser = User::firstWhere("id_user", $idUser);
        if (!$theUser) return view("errors.404");

        $role = $this->userRole;
        if ($role === "superadmin") {
            $arr = $this->getRulesMessagesPassword(false, true);
            $credentials = Validator::make($data, $arr["rules"], $arr["messages"])->validate();

            return $this->alterYourPassword($theUser, $credentials, self::DASHBOARD_URL . "/users/details/$theUser->id_user", "Password $theUser->name_lengkap berhasil diganti!");
        };

        return view("errors.403");
    }
}