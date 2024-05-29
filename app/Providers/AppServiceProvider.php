<?php

namespace App\Providers;

use App\Services\Interfaces\INotebookService;
use App\Services\NotebookService;
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
        $this->app->bind(INotebookService::class, NotebookService::class);
    }
}
