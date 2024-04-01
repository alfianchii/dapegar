<?php

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AliasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Get the AliasLoader instance
        $loader = AliasLoader::getInstance();

        // Add aliases
        $loader->alias('Image', 'Intervention\Image\Facades\Image');
        $loader->alias('Excel', 'Maatwebsite\Excel\Facades\Excel');
        $loader->alias('Alert', 'RealRashid\SweetAlert\Facades\Alert');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
