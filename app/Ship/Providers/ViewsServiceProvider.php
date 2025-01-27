<?php

namespace App\Ship\Providers;

use Apiato\Core\Foundation\Facades\Apiato;
use Apiato\Core\Loaders\ViewsLoaderTrait;
use Illuminate\Support\ServiceProvider;

class ViewsServiceProvider extends ServiceProvider
{
    use ViewsLoaderTrait;

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->runLoadersBoot();
    }

    public function runLoadersBoot(): void
    {
        foreach (Apiato::getAllContainerPaths() as $containerPath) {
            $this->loadViewsFromContainers($containerPath);
        }
    }

    public function loadViewsFromContainers($containerPath): void
    {
        $containerViewDirectory = $containerPath . '/UI/ADMIN/Views/';

        $containerName = basename($containerPath);
        $pathParts = explode(DIRECTORY_SEPARATOR, $containerPath);
        $sectionName = $pathParts[count($pathParts) - 2];

        $this->loadViews($containerViewDirectory, $containerName, $sectionName);
    }
}