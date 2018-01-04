<?php
namespace ModelMappers;


use Models\CampusClassSection;

class CampusClassSectionMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return CampusClassSection
     */
    public function map($dbModel)
    {
        /**
         * @var $model CampusClassSection
         */
        $model = parent::autoMap($dbModel, new CampusClassSection());
        return $model;
    }

    /**
     * @param CampusClassSection $model
     * @param array $properties
     * @return array
     */
    public function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}