<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewVariables = [
            "title" => "Beranda",
        ];
        return view('pages.landing-page.home.index', $viewVariables);
    }
}
