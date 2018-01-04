<?php
namespace ModelMappers;


use Models\Institute;

class InstituteMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return Institute
     */
    public  function map($dbModel)
    {
        /**
         * @var $model Institute
         */
        $model = parent::autoMap($dbModel, new Institute());
        return $model;
    }

    /**
     * @param Institute $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}