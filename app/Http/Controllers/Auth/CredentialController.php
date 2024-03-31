<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CredentialRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CredentialController extends Controller
{
    public function login()
    {
        $viewVariables = [
            "title" => "Login",
        ];
        return view('pages.auth.login.index', $viewVariables);
    }

    public function authenticate(CredentialRequest $request): RedirectResponse
    {
        $credentials = $request->validated();
        if (!Auth::attempt($credentials)) return back()->with("error", "NIP atau password salah!");
        $request->session()->regenerate();

        return redirect()->intended(self::DASHBOARD_URL);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(self::LOGIN_URL)->with("success", "Berhasil logout!");
    }
}
