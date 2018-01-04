<?php
/**
 * Created by PhpStorm.
 * user: nomantufail
 * Date: 10/10/2016
 * Time: 10:13 AM
 */

namespace Repositories;


use Illuminate\Support\Facades\DB;
use Models\Model;

abstract class Repository
{
    protected $model = null;
    public function setModel($model)
    {
        $this->model = clone($model);
        return $this;
    }

    public function getModel()
    {
        return clone($this->model);
    }

    protected function createUpdateableArray(Model $model, $columns){
        $attrs = $model->toArray();
        if(sizeof($columns) > 0){
            $attrs = [];
            foreach ($model->toArray() as $key => $value){
                if(in_array($key, $columns)){
                    $attrs[$key] = $value;
                }
            }
        }
        return $attrs;
    }
}