<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DynamicForm extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    protected $codename = 'dynamic_form';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('vendor.voyager.formfields.dynamic_form', [
            'row' => $row,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent,
            'options' => $options,
        ]);
    }
}
