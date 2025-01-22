<?php

namespace App\Containers\HomeSection\Home\UI\WEB\Controllers;

use App\Containers\HomeSection\Home\Actions\HomeAction;
use App\Ship\Parents\Controllers\WebController;

class HomeController extends WebController
{
    public function index()
    {
        return app(HomeAction::class)->run();
    }
}
