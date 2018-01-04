<?php
namespace ModelMappers;


use Models\LeaveReason;

class LeaveReasonMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return LeaveReason
     */
    public  function map($dbModel)
    {
        /**
         * @var $model LeaveReason
         */
        $model = parent::autoMap($dbModel, new LeaveReason());
        return $model;
    }

    /**
     * @param LeaveReason $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}