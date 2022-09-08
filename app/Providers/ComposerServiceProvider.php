<?php

namespace App\Providers;

use App\Models\Measurand;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        view()->composer('home', function ($view) {
            $measurands = Measurand::all();
            $view->with('measurands', $measurands);
        });

        // view()->composer('dashboard', function ($view) {
        //     // $asogli = Station::where('name', 'ASOGLI GS')->totalgeneration();
        //     $arr = [
        //         'asogli_gs' => $asogli,
        //     ];
        //     $view->with('arr', $arr);
        // });
    }
}
