<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\Constable;
use App\Traits\Responsable;
use Intervention\Image\Facades\Image;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\{Auth, File, Storage, View};

abstract class Controller extends BaseController
{
    use Constable, Responsable;


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

            View::share('dashboardURL', self::DASHBOARD_URL);
            View::share('homeURL', self::HOME_URL);
            View::share('loginURL', self::LOGIN_URL);

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



    public function slugRules(array $theRules, $inputSlug, $dataSlug)
    {
        $rules = $theRules;
        unset($rules["slug"]);
        if ($inputSlug !== $dataSlug)
            $rules["slug"] = $theRules["slug"];

        return $rules;
    }

    public function imageCropping($image, $credentials, $key, $storeUrl, $config = [
        "position" => "center",
        "width" => 1200,
        "height" => 1200,
    ])
    {
        if (array_key_exists($key, $credentials)) {
            if ($image) Storage::delete($image);

            $imageOriginalPath = $credentials[$key]->store($storeUrl);
            $credentials[$key] = $imageOriginalPath;
            $croppedImage = Image::make("storage/" . $imageOriginalPath);
            $croppedImage->fit($config["width"], $config["height"], function ($constraint) {
                $constraint->upsize();
            }, $config["position"]);

            Storage::put($imageOriginalPath, $croppedImage->stream());
        } else {
            if ($image) $credentials[$key] = $image;
            else $credentials[$key] = null;
        };

        return $credentials;
    }

    public function file($file, $credentials, $key, $storeUrl)
    {
        if (array_key_exists($key, $credentials)) {
            if ($file) Storage::delete($file);
            $credentials[$key] = $credentials[$key]->store($storeUrl);

            return $credentials;
        }

        return $credentials;
    }

    public function modify($data, array $credentials, $idUser, string $noun, $url)
    {
        try {
            $oldData = $data->fresh();
            $data->update($credentials);
            $newData = $data->fresh();

            $oldAttributes = $oldData->getAttributes();
            $newAttributes = $newData->getAttributes();

            if (($oldAttributes === $newAttributes))
                return redirect($url)
                    ->withInfo("Kamu tidak melakukan editing pada $noun.");

            $data->update(["updated_by" => $idUser]);
        } catch (\Exception $e) {
            return redirect($url)
                ->withErrors($e->getMessage());
        }

        return redirect($url)
            ->withSuccess(ucfirst($noun) . " berhasil disunting!");
    }
}
