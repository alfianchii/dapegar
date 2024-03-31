<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\Constable;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\{Auth, View, File};

abstract class Controller extends BaseController
{
    use Constable;


    protected User $userData;
    protected string $userRole;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                $this->userData = $this->getUserData();
                $this->userRole = $this->getUserRole($this->userData);

                View::share('userData', $this->userData);
                View::share('userRole', $this->userRole);
            }

            return $next($request);
        });
    }


    public function getUserData()
    {
        $user = Auth::user();
        if (!$user) return $this->logoutUserImmediately();

        return $user;
    }

    public function getUserRole(User $user)
    {
        if (!$user->role) return $this->logoutUserImmediately();

        return $user->role;
    }

    public function logoutUserImmediately()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->intended(self::LOGIN_URL);
    }
}
