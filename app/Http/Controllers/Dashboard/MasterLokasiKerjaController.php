<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterLokasiKerjaRequest;
use App\Models\MasterLokasiKerja;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasterLokasiKerjaController extends Controller
{
  public function lokasiKerjaRequest()
  {
    return new MasterLokasiKerjaRequest();
  }

  public function getRules()
  {
    return $this->lokasiKerjaRequest()->rules();
  }

  public function getMessages()
  {
    return $this->lokasiKerjaRequest()->messages();
  }



  public function index()
  {
    $role = $this->userRole;
    if ($role === "superadmin") {
      $lokasiKerja = MasterLokasiKerja::with(["users"])->get();

      $viewVariables = [
        "title" => "Master Lokasi Kerja",
        "lokasiKerja" => $lokasiKerja,
      ];
      return view("pages.dashboard.actors.superadmin.master-lokasi-kerja.index", $viewVariables);
    };

    return view("errors.403");
  }

  public function create()
  {
    $role = $this->userRole;
    if ($role === "superadmin") {
      $viewVariables = [
        "title" => "Buat Lokasi Kerja",
      ];
      return view("pages.dashboard.actors.superadmin.master-lokasi-kerja.create", $viewVariables);
    };

    return view("errors.403");
  }

  public function store(MasterLokasiKerjaRequest $request)
  {
    // Data processing
    $credentials = $request->validated();

    $role = $this->userRole;
    if ($role === "superadmin") {
      $credentials["created_by"] = $this->userData->id_user;
      $credentials["nama_lokasi_kerja"] = strtoupper($credentials["nama_lokasi_kerja"]);
      $credentials["nama_alias"] = strtoupper($credentials["nama_alias"]);

      MasterLokasiKerja::create($credentials);

      return redirect(self::DASHBOARD_URL . "/master-lokasi-kerja")->withSuccess("Data master lokasi kerja berhasil dibuat!");
    };

    return view("errors.403");
  }

  public function edit(string $idLokasiKerja)
  {
    // Data processing
    $lokasiKerja = MasterLokasiKerja::firstWhere("id_lokasi_kerja", $idLokasiKerja);
    if (!$lokasiKerja) return view("errors.404");

    $role = $this->userRole;
    if ($role === "superadmin") {
      $viewVariables = [
        "title" => "Edit Lokasi Kerja",
        "lokasiKerja" => $lokasiKerja,
      ];
      return view("pages.dashboard.actors.superadmin.master-lokasi-kerja.edit", $viewVariables);
    };

    return view("errors.403");
  }

  public function update(Request $request, string $idLokasiKerja)
  {
    // Data processing
    $data = $request->all();
    $lokasiKerja = MasterLokasiKerja::firstWhere("id_lokasi_kerja", $idLokasiKerja);
    if (!$lokasiKerja) return view("errors.404");

    $role = $this->userRole;
    if ($role === "superadmin") {
      $rules = $this->getRules();
      $data["nama_lokasi_kerja"] = strtoupper($data["nama_lokasi_kerja"]);
      $data["nama_alias"] = strtoupper($data["nama_alias"]);
      if ($data["nama_lokasi_kerja"] == $lokasiKerja->nama_lokasi_kerja) unset($rules["nama_lokasi_kerja"]);
      if ($data["nama_alias"] == $lokasiKerja->nama_alias) unset($rules["nama_alias"]);
      $credentials = Validator::make($data, $rules, $this->getMessages())->validate();

      return $this->modify($lokasiKerja, $credentials, $this->userData->id_user, "lokasi kerja", self::DASHBOARD_URL . "/master-lokasi-kerja");
    };

    return view("errors.403");
  }

  public function destroy(string $idLokasiKerja)
  {
    // Data processing
    $lokasiKerja = MasterLokasiKerja::firstWhere("id_lokasi_kerja", $idLokasiKerja);
    if (!$lokasiKerja) $this->responseJsonMessage("The data you are looking not found.", 404);

    $role = $this->userRole;
    if ($role === "superadmin") {
      try {
        if ($lokasiKerja->users->count() > 0) throw new \Exception("Tidak bisa menghapus data master lokasi kerja yang masih digunakan oleh data lain.");
        if (!$lokasiKerja->delete()) throw new \Exception("Error deleting master lokasi kerja data.");
      } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
        return $this->responseJsonMessage($e->getMessage(), 500);
      } catch (\Throwable $e) {
        return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
      }

      return $this->responseJsonMessage("Data master lokasi kerja telah dihapus!");
    };

    return $this->responseJsonMessage("You are unauthorized to do this action.", 422);
  }
}