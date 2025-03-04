<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class VoyagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        parent::boot();
        Voyager::addFormField(\App\FormFields\DynamicForm::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
