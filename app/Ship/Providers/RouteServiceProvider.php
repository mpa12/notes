<?php

namespace App\Ship\Providers;

use Apiato\Core\Foundation\Facades\Apiato;
use Apiato\Core\Loaders\RoutesLoaderTrait;
use App\Ship\Parents\Providers\RouteServiceProvider as ParentRouteServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use InvalidArgumentException;
use Symfony\Component\Finder\SplFileInfo;

class RouteServiceProvider extends ParentRouteServiceProvider
{
    use RoutesLoaderTrait;

    public function runRoutesAutoLoader(): void
    {
        parent::runRoutesAutoLoader();

        $allContainerPaths = Apiato::getAllContainerPaths();

        foreach ($allContainerPaths as $containerPath) {
            try {
                $this->loadAdminContainerRoutes($containerPath);
            } catch (InvalidArgumentException $e) {
                dd($containerPath, $e);
            }
        }
    }

    private function loadAdminContainerRoutes($containerPath): void
    {
        $adminRoutesPath = $this->getRoutePathsForUI($containerPath, 'ADMIN');

        if (File::isDirectory($adminRoutesPath)) {
            $files = $this->getFilesSortedByName($adminRoutesPath);
            foreach ($files as $file) {
                $this->loadAdminRoute($file);
            }
        }
    }

    private function loadAdminRoute(SplFileInfo $file): void
    {
        Route::group([
            'prefix' => config('backpack.base.route_prefix', 'admin'),
            'middleware' => array_merge(
                (array)config('backpack.base.web_middleware', 'web'),
                (array)config('backpack.base.middleware_key', 'admin')
            ),
        ], function () use ($file) {
            require $file->getPathname();
        });
    }
}
