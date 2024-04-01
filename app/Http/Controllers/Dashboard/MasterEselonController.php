<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterEselonRequest;
use App\Models\MasterEselon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasterEselonController extends Controller
{
  public function eselonRequest()
  {
    return new MasterEselonRequest();
  }

  public function getRules()
  {
    return $this->eselonRequest()->rules();
  }

  public function getMessages()
  {
    return $this->eselonRequest()->messages();
  }



  public function index()
  {
    $role = $this->userRole;
    if ($role === "superadmin") {
      $eselon = MasterEselon::with(["users"])->get();

      $viewVariables = [
        "title" => "Master Eselon",
        "eselon" => $eselon,
      ];
      return view("pages.dashboard.actors.superadmin.master-eselon.index", $viewVariables);
    };

    return view("errors.403");
  }

  public function create()
  {
    $role = $this->userRole;
    if ($role === "superadmin") {
      $viewVariables = [
        "title" => "Buat Eselon",
      ];
      return view("pages.dashboard.actors.superadmin.master-eselon.create", $viewVariables);
    };

    return view("errors.403");
  }

  public function store(MasterEselonRequest $request)
  {
    // Data processing
    $credentials = $request->validated();

    $role = $this->userRole;
    if ($role === "superadmin") {
      $credentials["created_by"] = $this->userData->id_user;
      $credentials["nama_eselon"] = strtoupper($credentials["nama_eselon"]);

      MasterEselon::create($credentials);

      return redirect(self::DASHBOARD_URL . "/master-eselon")->withSuccess("Data master eselon berhasil dibuat!");
    };

    return view("errors.403");
  }

  public function edit(string $idEselon)
  {
    // Data processing
    $eselon = MasterEselon::firstWhere("id_eselon", $idEselon);
    if (!$eselon) return view("errors.404");

    $role = $this->userRole;
    if ($role === "superadmin") {
      $viewVariables = [
        "title" => "Edit Eselon",
        "eselon" => $eselon,
      ];
      return view("pages.dashboard.actors.superadmin.master-eselon.edit", $viewVariables);
    };

    return view("errors.403");
  }

  public function update(Request $request, string $idEselon)
  {
    // Data processing
    $data = $request->all();
    $eselon = MasterEselon::firstWhere("id_eselon", $idEselon);
    if (!$eselon) return view("errors.404");

    $role = $this->userRole;
    if ($role === "superadmin") {
      $rules = $this->getRules();
      $data["nama_eselon"] = strtoupper($data["nama_eselon"]);
      if ($data["nama_eselon"] == $eselon->nama_eselon) unset($rules["nama_eselon"]);
      $credentials = Validator::make($data, $rules, $this->getMessages())->validate();

      return $this->modify($eselon, $credentials, $this->userData->id_user, "eselon", self::DASHBOARD_URL . "/master-eselon");
    };

    return view("errors.403");
  }

  public function destroy(string $idEselon)
  {
    // Data processing
    $eselon = MasterEselon::firstWhere("id_eselon", $idEselon);
    if (!$eselon) $this->responseJsonMessage("The data you are looking not found.", 404);

    $role = $this->userRole;
    if ($role === "superadmin") {
      try {
        if ($eselon->users->count() > 0) throw new \Exception("Tidak bisa menghapus data master eselon yang masih digunakan oleh data lain.");
        if (!$eselon->delete()) throw new \Exception("Error deleting master eselon data.");
      } catch (\PDOException | ModelNotFoundException | QueryException | \Exception $e) {
        return $this->responseJsonMessage($e->getMessage(), 500);
      } catch (\Throwable $e) {
        return $this->responseJsonMessage("An error occurred: " . $e->getMessage(), 500);
      }

      return $this->responseJsonMessage("Data master eselon telah dihapus!");
    };

    return $this->responseJsonMessage("You are unauthorized to do this action.", 422);
  }
}
