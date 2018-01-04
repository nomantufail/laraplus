<?php
namespace ModelMappers;


use Models\BankAccount;

class BankAccountMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return BankAccount
     */
    public function map($dbModel)
    {
        /**
         * @var $model BankAccount
         */
        $model = parent::autoMap($dbModel, new BankAccount());
        return $model;
    }

    /**
     * @param BankAccount $model
     * @param array $properties
     * @return array
     */
    public function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}