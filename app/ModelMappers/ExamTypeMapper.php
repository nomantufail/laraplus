<?php
namespace ModelMappers;


use Models\ExamType;

class ExamTypeMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return ExamType
     */
    public  function map($dbModel)
    {
        /**
         * @var $model ExamType
         */
        $model = parent::autoMap($dbModel, new ExamType());
        return $model;
    }

    /**
     * @param ExamType $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}