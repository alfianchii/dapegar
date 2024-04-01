<?php

use App\Http\Controllers\Auth\{CredentialController};
use App\Http\Controllers\Dashboard\{
    DashboardController,
    MasterAgamaController,
    MasterEselonController,
    MasterGolonganPangkatController,
    MasterJabatanController,
    MasterLokasiKerjaController,
    MasterUnitKerjaController,
    MasterUserController,
};
use App\Http\Controllers\Home\{
    HomeController
};
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"]);

Route::get('/login', [CredentialController::class, 'login'])->name("login")->middleware(["guest"]);
Route::post('/login', [CredentialController::class, 'authenticate'])->middleware(["guest"]);
Route::post('/logout', [CredentialController::class, 'logout'])->middleware(["auth"]);


Route::group(["prefix" => "dashboard", "middleware" => ["auth"]], function () {
    Route::get('/', [DashboardController::class, "index"]);

    // Master Agama
    Route::resource('/master-agama', MasterAgamaController::class)->except(["show"]);

    // Master Eselon
    Route::resource('/master-eselon', MasterEselonController::class)->except(["show"]);

    // Master Golongan Pangkat
    Route::resource('/master-golongan-pangkat', MasterGolonganPangkatController::class)->except(["show"]);

    // Master Jabatan
    Route::resource('/master-jabatan', MasterJabatanController::class)->except(["show"]);

    // Master Lokasi Kerja
    Route::resource('/master-lokasi-kerja', MasterLokasiKerjaController::class)->except(["show"]);

    // Master Unit Kerja
    Route::resource('/master-unit-kerja', MasterUnitKerjaController::class)->except(["show"]);

    // Accounts
    Route::get("/users/account", [MasterUserController::class, "profile"]);
    Route::get("/users/account/settings", [MasterUserController::class, "settings"]);
    Route::put("/users/account/settings/{user:id_user}", [MasterUserController::class, "settingsUpdate"]);
    Route::get("/users/account/password", [MasterUserController::class, "changePassword"]);
    Route::put("/users/account/password/update", [MasterUserController::class, "changePasswordUpdate"]);
    Route::delete("/users/account/settings/{user:id_user}/profile-picture", [MasterUserController::class, "destroyYourProfilePicture"]);

    // Users
    Route::get("/users/register", [MasterUserController::class, "register"]);
    Route::delete("/users/{user:id_user}/profile-picture", [MasterUserController::class, "destroyProfilePicture"]);
    Route::get("/users/details/{user:id_user}", [MasterUserController::class, "show"]);
    Route::get("/users/details/{user:id_user}/edit", [MasterUserController::class, "edit"]);
    Route::patch("/users/mutate-user-password/{user:id_user}", [MasterUserController::class, "mutateUserPassword"]);
    Route::resource("/users", MasterUserController::class)->except(["create", "show", "edit"]);

    // Exports
    Route::post('/users/export', [MasterUserController::class, "export"]);
});
