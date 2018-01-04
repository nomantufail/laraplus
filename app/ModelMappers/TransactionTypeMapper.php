<?php
namespace ModelMappers;


use Models\TransactionType;

class TransactionTypeMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return TransactionType
     */
    public  function map($dbModel)
    {
        /**
         * @var $model TransactionType
         */
        $model = parent::autoMap($dbModel, new TransactionType());
        return $model;
    }

    /**
     * @param TransactionType $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}