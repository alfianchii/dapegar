<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterUnitKerjaRequest;
use App\Models\MasterUnitKerja;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasterUnitKerjaController extends Controller
{
  public function unitKerjaRequest()
  {
    return new MasterUnitKerjaRequest();
  }

  public function getRules()
  {
    return $this->unitKerjaRequest()->rules();
  }

  public function getMessages()
  {
    return $this->unitKerjaRequest()->messages();
  }



  public function index()
  {
    $role = $this->userRole;
    if ($role === "superadmin") {
      $unitKerja = MasterUnitKerja::with(["users"])->get();

      $viewVariables = [
        "title" => "Master Unit Kerja",
        "unitKerja" => $unitKerja,
      ];
      return view("pages.dashboard.actors.superadmin.master-unit-kerja.index", $viewVariables);
    };

    return view("errors.403");
  }

  public function create()
  {
    $role = $this->userRole;
    if ($role === "superadmin") {
      $viewVariables = [
        "title" => "Buat Unit Kerja",
      ];
      return view("pages.dashboard.actors.superadmin.master-unit-kerja.create", $viewVariables);
    };

    return view("errors.403");
  }

  public function store(MasterUnitKerjaRequest $request)
  {
    // Data processing
    $credentials = $request->validated();

    $role = $this->userRole;
    if ($role === "superadmin") {
      $credentials["created_by"] = $this->userData->id_user;
      $credentials["nama_unit_kerja"] = strtoupper($credentials["nama_unit_kerja"]);

      MasterUnitKerja::create($credentials);

      return redirect(self::DASHBOARD_URL . "/master-unit-kerja")->withSuccess("Data master unit kerja berhasil dibuat!");
    };

    return view("errors.403");
  }

  public function edit(string $idUnitKerja)
  {
    // Data processing
    $unitKerja = MasterUnitKerja::firstWhere("id_unit_kerja", $idUnitKerja);
    if (!$unitKerja) return view("errors.404");

    $role = $this->userRole;
    if ($role === "superadmin") {
      $viewVariables = [
        "title" => "Edit Unit Kerja",
        "unitKerja" => $unitKerja,
      ];
      return view("pages.dashboard.actors.superadmin.master-unit-kerja.edit", $viewVariables);
    };

    return view("errors.403");
  }

  public function update(Request $request, string $idUnitKerja)
  {
    // Data processing
    $data = $request->all();
    $unitKerja = MasterUnitKerja::firstWhere("id_unit_kerja", $idUnitKerja);
    if (!$unitKerja) return view("errors.404");

    $role = $this->userRole;
    if ($role === "superadmin") {
      $rules = $this->getRules();
      $data["nama_unit_kerja"] = strtoupper($data["nama_unit_kerja"]);
      if ($data["nama_unit_kerja"] == $unitKerja->nama_unit_kerja) unset($rules["nama_unit_kerja"]);
      $credentials = Validator::make($data, $rules, $this->getMessages())->validate();

      return $this->modify($unitKerja, $credentials, $this->userData->id_user, "unit kerja", self::DASHBOARD_URL . "/master-unit-kerja");
    };

    return view("errors.403");
  }

  public function destroy(string $idUnitKerja)
  {
    // Data processing
    $unitKerja = MasterUnitKerja::firstWhere("id_unit_kerja", $idUnitKerja);
    if (!$unitKerja) $this->responseJsonMessage("The data you are looking not found.", 404);

    $role = $this->userRole;
    if ($role === "superadmin") {
      try {
        if ($unitKerja->users->count() > 0) throw new \Exception("Tidak bisa menghapus data master unit kerja yang masih digunakan oleh data lain.");
        if (!$unitKerja->delete()) throw new \Exception("Error deleting master unit kerja data.");
      } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
        return $this->responseJsonMessage($e->getMessage(), 500);
      } catch (\Throwable $e) {
        return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
      }

      return $this->responseJsonMessage("Data master unit kerja telah dihapus!");
    };

    return $this->responseJsonMessage("You are unauthorized to do this action.", 422);
  }
}
