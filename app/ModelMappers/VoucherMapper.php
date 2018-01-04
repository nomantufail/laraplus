<?php
namespace ModelMappers;


use Models\Voucher;

class VoucherMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return Voucher
     */
    public  function map($dbModel)
    {
        /**
         * @var $model Voucher
         */
        $model = parent::autoMap($dbModel, new Voucher());
        return $model;
    }

    /**
     * @param Voucher $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}