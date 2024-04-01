<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterGolonganPangkatRequest;
use App\Models\MasterGolonganPangkat;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasterGolonganPangkatController extends Controller
{
  public function golonganPangkatRequest()
  {
    return new MasterGolonganPangkatRequest();
  }

  public function getRules()
  {
    return $this->golonganPangkatRequest()->rules();
  }

  public function getMessages()
  {
    return $this->golonganPangkatRequest()->messages();
  }



  public function index()
  {
    $role = $this->userRole;
    if ($role === "superadmin") {
      $golonganPangkat = MasterGolonganPangkat::with(["users"])->get();

      $viewVariables = [
        "title" => "Master Golongan Pangkat",
        "golonganPangkat" => $golonganPangkat,
      ];
      return view("pages.dashboard.actors.superadmin.master-golongan-pangkat.index", $viewVariables);
    };

    return view("errors.403");
  }

  public function create()
  {
    $role = $this->userRole;
    if ($role === "superadmin") {
      $viewVariables = [
        "title" => "Buat Golongan Pangkat",
      ];
      return view("pages.dashboard.actors.superadmin.master-golongan-pangkat.create", $viewVariables);
    };

    return view("errors.403");
  }

  public function store(MasterGolonganPangkatRequest $request)
  {
    // Data processing
    $credentials = $request->validated();

    $role = $this->userRole;
    if ($role === "superadmin") {
      $credentials["created_by"] = $this->userData->id_user;

      MasterGolonganPangkat::create($credentials);

      return redirect(self::DASHBOARD_URL . "/master-golongan-pangkat")->withSuccess("Data master golongan pangkat berhasil dibuat!");
    };

    return view("errors.403");
  }

  public function edit(string $idGolonganPangkat)
  {
    // Data processing
    $golonganPangkat = MasterGolonganPangkat::firstWhere("id_golongan_pangkat", $idGolonganPangkat);
    if (!$golonganPangkat) return view("errors.404");

    $role = $this->userRole;
    if ($role === "superadmin") {
      $viewVariables = [
        "title" => "Edit Golongan Pangkat",
        "golonganPangkat" => $golonganPangkat,
      ];
      return view("pages.dashboard.actors.superadmin.master-golongan-pangkat.edit", $viewVariables);
    };

    return view("errors.403");
  }

  public function update(Request $request, string $idGolonganPangkat)
  {
    // Data processing
    $data = $request->all();
    $golonganPangkat = MasterGolonganPangkat::firstWhere("id_golongan_pangkat", $idGolonganPangkat);
    if (!$golonganPangkat) return view("errors.404");

    $role = $this->userRole;
    if ($role === "superadmin") {
      $rules = $this->getRules();
      if ($data["nama_pangkat"] == $golonganPangkat->nama_pangkat) unset($rules["nama_pangkat"]);
      $credentials = Validator::make($data, $rules, $this->getMessages())->validate();

      return $this->modify($golonganPangkat, $credentials, $this->userData->id_user, "golongan pangkat", self::DASHBOARD_URL . "/master-golongan-pangkat");
    };

    return view("errors.403");
  }

  public function destroy(string $idGolonganPangkat)
  {
    // Data processing
    $golonganPangkat = MasterGolonganPangkat::firstWhere("id_golongan_pangkat", $idGolonganPangkat);
    if (!$golonganPangkat) $this->responseJsonMessage("The data you are looking not found.", 404);

    $role = $this->userRole;
    if ($role === "superadmin") {
      try {
        if ($golonganPangkat->users->count() > 0) throw new \Exception("Tidak bisa menghapus data master golongan pangkat yang masih digunakan oleh data lain.");
        if (!$golonganPangkat->delete()) throw new \Exception("Error deleting master golongan pangkat data.");
      } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
        return $this->responseJsonMessage($e->getMessage(), 500);
      } catch (\Throwable $e) {
        return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
      }

      return $this->responseJsonMessage("Data master golongan pangkat telah dihapus!");
    };

    return $this->responseJsonMessage("You are unauthorized to do this action.", 422);
  }
}
