<?php

namespace App\Http\Controllers;


class StudentsController extends ParentController
{
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @param \Requests\Students\ListStudentsRequest $request
     * @return mixed
     * Description: 
     */
    public function list(\Requests\Students\ListStudentsRequest $request)
    {
        try
        {
            return $this->response->setView('students.list_students')->respond([
                'data'=>[]
            ]);
        }catch (\Exception $e){
            return $this->response->respondInternalServerError($e->getMessage());
        }
    }
//DummyNewRequestMethod
}
