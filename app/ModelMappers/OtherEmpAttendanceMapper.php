<?php
namespace ModelMappers;


use Models\OtherEmpAttendance;

class OtherEmpAttendanceMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return OtherEmpAttendance
     */
    public  function map($dbModel)
    {
        /**
         * @var $model OtherEmpAttendance
         */
        $model = parent::autoMap($dbModel, new OtherEmpAttendance());
        return $model;
    }

    /**
     * @param OtherEmpAttendance $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}