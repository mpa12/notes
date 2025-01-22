<?php

namespace App\Containers\HomeSection\Home\Actions;

use App\Ship\Parents\Actions\Action as ParentAction;

class HomeAction extends ParentAction
{
    public function run(): mixed
    {
        return view('homeSection@home::home');
    }
}
