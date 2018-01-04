<?php
namespace ModelMappers;


use Models\CampusExamType;

class CampusExamTypeMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return CampusExamType
     */
    public function map($dbModel)
    {
        /**
         * @var $model CampusExamType
         */
        $model = parent::autoMap($dbModel, new CampusExamType());
        return $model;
    }

    /**
     * @param CampusExamType $model
     * @param array $properties
     * @return array
     */
    public function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}