<?php
namespace ModelMappers;


use Models\OtherEmployee;

class OtherEmployeeMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return OtherEmployee
     */
    public  function map($dbModel)
    {
        /**
         * @var $model OtherEmployee
         */
        $model = parent::autoMap($dbModel, new OtherEmployee());
        return $model;
    }

    /**
     * @param OtherEmployee $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}