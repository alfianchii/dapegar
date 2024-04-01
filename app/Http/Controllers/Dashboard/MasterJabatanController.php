<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterJabatanRequest;
use App\Models\MasterJabatan;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasterJabatanController extends Controller
{
  public function jabatanRequest()
  {
    return new MasterJabatanRequest();
  }

  public function getRules()
  {
    return $this->jabatanRequest()->rules();
  }

  public function getMessages()
  {
    return $this->jabatanRequest()->messages();
  }



  public function index()
  {
    $role = $this->userRole;
    if ($role === "superadmin") {
      $jabatan = MasterJabatan::with(["users"])->get();

      $viewVariables = [
        "title" => "Master Jabatan",
        "jabatan" => $jabatan,
      ];
      return view("pages.dashboard.actors.superadmin.master-jabatan.index", $viewVariables);
    };

    return view("errors.403");
  }

  public function create()
  {
    $role = $this->userRole;
    if ($role === "superadmin") {
      $viewVariables = [
        "title" => "Buat Jabatan",
      ];
      return view("pages.dashboard.actors.superadmin.master-jabatan.create", $viewVariables);
    };

    return view("errors.403");
  }

  public function store(MasterJabatanRequest $request)
  {
    // Data processing
    $credentials = $request->validated();

    $role = $this->userRole;
    if ($role === "superadmin") {
      $credentials["created_by"] = $this->userData->id_user;
      $credentials["nama_jabatan"] = strtoupper($credentials["nama_jabatan"]);

      MasterJabatan::create($credentials);

      return redirect(self::DASHBOARD_URL . "/master-jabatan")->withSuccess("Data master jabatan berhasil dibuat!");
    };

    return view("errors.403");
  }

  public function edit(string $idJabatan)
  {
    // Data processing
    $jabatan = MasterJabatan::firstWhere("id_jabatan", $idJabatan);
    if (!$jabatan) return view("errors.404");

    $role = $this->userRole;
    if ($role === "superadmin") {
      $viewVariables = [
        "title" => "Edit Jabatan",
        "jabatan" => $jabatan,
      ];
      return view("pages.dashboard.actors.superadmin.master-jabatan.edit", $viewVariables);
    };

    return view("errors.403");
  }

  public function update(Request $request, string $idJabatan)
  {
    // Data processing
    $data = $request->all();
    $jabatan = MasterJabatan::firstWhere("id_jabatan", $idJabatan);
    if (!$jabatan) return view("errors.404");

    $role = $this->userRole;
    if ($role === "superadmin") {
      $rules = $this->getRules();
      $data["nama_jabatan"] = strtoupper($data["nama_jabatan"]);
      if ($data["nama_jabatan"] == $jabatan->nama_jabatan) unset($rules["nama_jabatan"]);
      $credentials = Validator::make($data, $rules, $this->getMessages())->validate();

      return $this->modify($jabatan, $credentials, $this->userData->id_user, "jabatan", self::DASHBOARD_URL . "/master-jabatan");
    };

    return view("errors.403");
  }

  public function destroy(string $idJabatan)
  {
    // Data processing
    $jabatan = MasterJabatan::firstWhere("id_jabatan", $idJabatan);
    if (!$jabatan) $this->responseJsonMessage("The data you are looking not found.", 404);

    $role = $this->userRole;
    if ($role === "superadmin") {
      try {
        if ($jabatan->users->count() > 0) throw new \Exception("Tidak bisa menghapus data master jabatan yang masih digunakan oleh data lain.");
        if (!$jabatan->delete()) throw new \Exception("Error deleting master jabatan data.");
      } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
        return $this->responseJsonMessage($e->getMessage(), 500);
      } catch (\Throwable $e) {
        return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
      }

      return $this->responseJsonMessage("Data master jabatan telah dihapus!");
    };

    return $this->responseJsonMessage("You are unauthorized to do this action.", 422);
  }
}
