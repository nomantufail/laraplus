<?php
/**
 * Created by PhpStorm.
 * User: nomantufail
 * Date: 20/09/2017
 * Time: 5:05 PM
 */

namespace ModelMappers;


use Libs\Helper;
use Models\Model;

abstract class ModelMapper
{

    public abstract function map($dbModel);
    /**
     * @param $dbModel
     * @param Model $customModel
     * @return Model
     */
    //todo: through exception if values are not mapable?
    protected  function autoMap($dbModel, Model $customModel){
        foreach ($dbModel->toArray() as $key=>$value){
            $setter = "set".ucfirst(Helper::strToCamelCase($key));
            if(method_exists($customModel, $setter)){
                $customModel->$setter($value);
            }
        }
        return $customModel;
    }

    /**
     * @param $collection
     * @return Model[] Array
     */
    public function mapCollection($collection){
        $final_array = [];
        foreach ($collection as $key => $value) {
            $final_array[] = $this->map($value);
        }
        return $final_array;
    }

    /**
     * @param Model $customModel
     * @return array []
     */
    //todo: through exception if values are not mapable?
    protected  function autoMapOnTable(Model $customModel, $properties=[]){
        $arr = [];
        $customModelProps = $customModel->toArray();
        foreach ($customModelProps as $key=>$value){
            if(in_array($key,$properties) || sizeof($properties) == 0){
                $arr[Helper::camlecaseToUnderscore($key)] = $value;
            }
        }
        return $arr;
    }
}