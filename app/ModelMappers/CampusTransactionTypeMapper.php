<?php
namespace ModelMappers;


use Models\CampusTransactionType;

class CampusTransactionTypeMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return CampusTransactionType
     */
    public  function map($dbModel)
    {
        /**
         * @var $model CampusTransactionType
         */
        $model = parent::autoMap($dbModel, new CampusTransactionType());
        return $model;
    }

    /**
     * @param CampusTransactionType $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}