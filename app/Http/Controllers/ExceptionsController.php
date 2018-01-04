<?php

namespace App\Http\Controllers;

class ExceptionsController extends ParentController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function snap(\Requests\Exceptions\SomeThingWentWrongRequest $request)
    {
        return $this->response->setView('exceptions.something_went_wrong')->respond([
            'data'=>[
                'message'=>'some thing went wrong'
            ],
        ]);
    }
//DummyNewRequestMethod
}
