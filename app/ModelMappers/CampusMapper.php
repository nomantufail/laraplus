<?php
namespace ModelMappers;


use Models\Campus;

class CampusMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return Campus
     */
    public  function map($dbModel)
    {
        /**
         * @var $model Campus
         */
        $model = parent::autoMap($dbModel, new Campus());
        return $model;
    }

    /**
     * @param Campus $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}