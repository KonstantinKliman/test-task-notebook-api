<?php

namespace App\Providers;

use App\Repositories\Interfaces\INotebookRepository;
use App\Repositories\NotebookRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
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
        $this->app->bind(INotebookRepository::class, NotebookRepository::class);
    }
}
