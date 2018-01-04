<?php
namespace ModelMappers;


use Models\Guardian;

class GuardianMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return Guardian
     */
    public  function map($dbModel)
    {
        /**
         * @var $model Guardian
         */
        $model = parent::autoMap($dbModel, new Guardian());
        return $model;
    }

    /**
     * @param Guardian $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}