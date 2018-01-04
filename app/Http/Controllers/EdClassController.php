<?php

namespace App\Http\Controllers;

use RepoFactories\EdClassesRepoFactory;
use Libs\Helper;



class EdClassController extends ParentController
{
    public $classesRepo =  null;

    public function __construct()
    {
        parent::__construct();
        $this->classesRepo = (new EdClassesRepoFactory())->getRepo();
    }


    /**
     * @param \Requests\ClassesDetailsRequest $request
     * @return mixed
     * Description: return class with section list and subjects
     */
    public function classesDetails(\Requests\ClassesDetailsRequest $request)
    {
        try
        {
            $classesData = $this->classesRepo->getClassesWithDetails();
            return $this->response->respond([
                'data'=>[
                    'details' =>Helper::modelsArrayToJson($classesData)
                ]
            ]);
        }catch (\Exception $e){
            return $this->response->respondInternalServerError($e->getMessage());
        }
    }
//DummyNewRequestMethod
}
