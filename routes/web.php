<?php

use App\Http\Controllers\Auth\{CredentialController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $viewVariables = [
        "title" => "Beranda",
    ];
    return view('pages.landing-page.home.index', $viewVariables);
});

Route::get('/login', [CredentialController::class, 'login'])->middleware(["guest"]);
Route::post('/login', [CredentialController::class, 'authenticate'])->middleware(["guest"]);
Route::post('/logout', [CredentialController::class, 'logout'])->middleware(["auth"]);


Route::group(["prefix" => "dashboard", "middleware" => "auth"], function () {
    Route::get('/', function () {
        $viewVariables = [
            "title" => "Dashboard",
        ];
        return view('pages.dashboard.home.index', $viewVariables);
    });
});
