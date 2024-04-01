<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\{MasterEselon, MasterGolonganPangkat, MasterJabatan, MasterLokasiKerja, MasterUnitKerja, User};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function greeting()
    {
        $hour = now()->hour;
        if ($hour >= 5 && $hour <= 11) return 'Selamat pagi';
        if ($hour >= 12 && $hour <= 15) return 'Selamat siang';
        if ($hour >= 16 && $hour <= 18) return 'Selamat sore';

        return 'Selamat malam';
    }


    public function index()
    {
        $role = $this->userRole;
        if ($role === "superadmin") {
            $usersCount = User::count();
            $superadminsCount = User::where("role", "superadmin")->count();
            $officersCount = User::where("role", "officer")->count();
            $unitKerjaCount = MasterUnitKerja::count();
            $lokasiKerjaCount = MasterLokasiKerja::count();
            $jabatanCount = MasterJabatan::count();
            $eselonCount = MasterEselon::count();
            $golonganPangkatCount = MasterGolonganPangkat::count();
            $newUsers = User::with(["golonganPangkat"])->whereNot("id_user", $this->userData->id_user)->orderBy("created_at", "desc")->limit(5)->get();

            $viewVariables = [
                "title" => "Dashboard",
                "greeting" => $this->greeting(),
                "usersCount" => $usersCount,
                "superadminsCount" => $superadminsCount,
                "officersCount" => $officersCount,
                "unitKerjaCount" => $unitKerjaCount,
                "lokasiKerjaCount" => $lokasiKerjaCount,
                "jabatanCount" => $jabatanCount,
                "eselonCount" => $eselonCount,
                "golonganPangkatCount" => $golonganPangkatCount,
                "newUsers" => $newUsers,
            ];
            return view("pages.dashboard.actors.superadmin.index", $viewVariables);
        }
    }
}
