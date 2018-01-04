<?php
namespace ModelMappers;


use Models\CampusClass;

class CampusClassMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return CampusClass
     */
    public function map($dbModel)
    {
        /**
         * @var $model CampusClass
         */
        $model = parent::autoMap($dbModel, new CampusClass());
        return $model;
    }

    /**
     * @param CampusClass $model
     * @param array $properties
     * @return array
     */
    public function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}