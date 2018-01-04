<?php

namespace App\Http\Controllers;
use RepoFactories\FeeStructureRepoFactory;
class FeeStructureController extends ParentController
{

    public $feeStructureRepo = null;
    public function __construct()
    {
        parent::__construct();
        $this->feeStructureRepo = (new FeeStructureRepoFactory())->getRepo();
    }

    private function fetchByParams($params){
        $feeStructure = [];
        if(isset($params['section_id']) && $params['section_id'] != null){
            $feeStructure = $this->feeStructureRepo->getBySection($params['section_id']);
        }else{
            $feeStructure = $this->feeStructureRepo->getFullStructure();
        }
        return $feeStructure;
    }

    /**
     * @param \Requests\GetFeeStructureRequest $request
     * @return mixed
     * Description: 
     */
    public function get(\Requests\GetFeeStructureRequest $request)
    {
        try
        {
            $feeStructure = $this->fetchByParams($request->all());
            return $this->response->respond([
                'data'=>[
                    'fee_structure' => \Libs\Helper::modelsArrayToJson($feeStructure)
                ]
            ]);
        }catch (\Exception $e){
            return $this->response->respondInternalServerError($e->getMessage());
        }
    }
//DummyNewRequestMethod
}
