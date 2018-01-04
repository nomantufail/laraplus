<?php
namespace ModelMappers;


use Models\VoucherEntrySettlementStatus;

class VoucherEntrySettlementStatusMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return VoucherEntrySettlementStatus
     */
    public function map($dbModel)
    {
        /**
         * @var $model VoucherEntrySettlementStatus
         */
        $model = $this->autoMap($dbModel, new VoucherEntrySettlementStatus());
        return $model;
    }

    /**
     * @param VoucherEntrySettlementStatus $model
     * @param array $properties
     * @return array
     */
    public function mapOnTable($model, $properties = [])
    {
       return $this->autoMapOnTable($model, $properties);
    }
}