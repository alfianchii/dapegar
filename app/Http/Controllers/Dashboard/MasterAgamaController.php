<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterAgamaRequest;
use App\Models\MasterAgama;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasterAgamaController extends Controller
{
    public function agamaRequest()
    {
        return new MasterAgamaRequest();
    }

    public function getRules()
    {
        return $this->agamaRequest()->rules();
    }

    public function getMessages()
    {
        return $this->agamaRequest()->messages();
    }



    public function index()
    {
        $role = $this->userRole;
        if ($role === "superadmin") {
            $agama = MasterAgama::with(["users"])->get();

            $viewVariables = [
                "title" => "Master Agama",
                "agama" => $agama,
            ];
            return view("pages.dashboard.actors.superadmin.master-agama.index", $viewVariables);
        };

        return view("errors.403");
    }

    public function create()
    {
        $role = $this->userRole;
        if ($role === "superadmin") {
            $viewVariables = [
                "title" => "Buat Agama",
            ];
            return view("pages.dashboard.actors.superadmin.master-agama.create", $viewVariables);
        };

        return view("errors.403");
    }

    public function store(MasterAgamaRequest $request)
    {
        // Data processing
        $credentials = $request->validated();

        $role = $this->userRole;
        if ($role === "superadmin") {
            $credentials["created_by"] = $this->userData->id_user;

            MasterAgama::create($credentials);

            return redirect(self::DASHBOARD_URL . "/master-agama")->withSuccess("Data master agama berhasil dibuat!");
        };

        return view("errors.403");
    }

    public function edit(string $idAgama)
    {
        // Data processing
        $agama = MasterAgama::firstWhere("id_agama", $idAgama);
        if (!$agama) return view("errors.404");

        $role = $this->userRole;
        if ($role === "superadmin") {
            $viewVariables = [
                "title" => "Edit Agama",
                "agama" => $agama,
            ];
            return view("pages.dashboard.actors.superadmin.master-agama.edit", $viewVariables);
        };

        return view("errors.403");
    }

    public function update(Request $request, string $idAgama)
    {
        // Data processing
        $data = $request->all();
        $agama = MasterAgama::firstWhere("id_agama", $idAgama);
        if (!$agama) return view("errors.404");

        $role = $this->userRole;
        if ($role === "superadmin") {
            $rules = $this->getRules();
            if ($data["nama_agama"] == $agama->nama_agama) unset($rules["nama_agama"]);
            $credentials = Validator::make($data, $rules, $this->getMessages())->validate();

            return $this->modify($agama, $credentials, $this->userData->id_user, "agama", self::DASHBOARD_URL . "/master-agama");
        };

        return view("errors.403");
    }

    public function destroy(string $idAgama)
    {
        // Data processing
        $agama = MasterAgama::firstWhere("id_agama", $idAgama);
        if (!$agama) $this->responseJsonMessage("The data you are looking not found.", 404);

        $role = $this->userRole;
        if ($role === "superadmin") {
            try {
                if ($agama->users->count() > 0) throw new \Exception("Tidak bisa menghapus data master agama yang masih digunakan oleh data lain.");
                if (!$agama->delete()) throw new \Exception("Error deleting master agama data.");
            } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
                return $this->responseJsonMessage($e->getMessage(), 500);
            } catch (\Throwable $e) {
                return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
            }

            return $this->responseJsonMessage("Data master agama telah dihapus!");
        };

        return $this->responseJsonMessage("You are unauthorized to do this action.", 422);
    }
}
