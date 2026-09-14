<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {     //regeln aufsetzten wer was sehen darf
        // Gate::define('view-admin', function(User $user){return true;}
        //return $user->id === 1; hieße nur der user mit der id 1 darf das sehen

        //Gate::define('task-view',function(){
        //         return false;
        //});
    }
}
