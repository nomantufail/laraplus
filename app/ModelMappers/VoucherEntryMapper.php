<?php
namespace ModelMappers;


use Models\VoucherEntry;

class VoucherEntryMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return VoucherEntry
     */
    public  function map($dbModel)
    {
        /**
         * @var $model VoucherEntry
         */
        $model = parent::autoMap($dbModel, new VoucherEntry());
        return $model;
    }

    /**
     * @param VoucherEntry $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}