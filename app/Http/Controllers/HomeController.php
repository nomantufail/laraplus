<?php

namespace App\Http\Controllers;


class HomeController extends ParentController
{
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @param \Requests\ShowHomePageRequest $request
     * @return mixed
     * Description: shows the homepage of the dashboard
     */
    public function showHome(\Requests\ShowHomePageRequest $request)
    {
        try
        {
            return $this->response->setView('home')->respond([
                'data'=>[]
            ]);
        }catch (\Exception $e){
            return $this->response->respondInternalServerError($e->getMessage());
        }
    }
//DummyNewRequestMethod
}
