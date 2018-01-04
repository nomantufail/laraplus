<?php
namespace ModelMappers;


use Models\StudentAttendance;

class StudentAttendanceMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return StudentAttendance
     */
    public  function map($dbModel)
    {
        /**
         * @var $model StudentAttendance
         */
        $model = parent::autoMap($dbModel, new StudentAttendance());
        return $model;
    }

    /**
     * @param StudentAttendance $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}