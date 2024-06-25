<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
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
    {
        // was { "data": { "id": 1,}}, now without word data
        JsonResource::withoutWrapping();

        //to make it faster, to prevent that an nessay data loding , by showing een error message Attempted to lazy load [user] on .... , so we can fix resourse by whenLoaded 
        Model::preventLazyLoading();

        //turn off mass assignment o
        Model::unguard();

    }
}
