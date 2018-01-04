<?php
namespace ModelMappers;


use Models\CampusDatesheet;

class CampusDatesheetMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return CampusDatesheet
     */
    public function map($dbModel)
    {
        /**
         * @var $model CampusDatesheet
         */
        $model = parent::autoMap($dbModel, new CampusDatesheet());
        return $model;
    }

    /**
     * @param CampusDatesheet $model
     * @param array $properties
     * @return array
     */
    public function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}