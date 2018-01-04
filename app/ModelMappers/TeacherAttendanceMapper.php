<?php
namespace ModelMappers;


use Models\TeacherAttendance;

class TeacherAttendanceMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return TeacherAttendance
     */
    public  function map($dbModel)
    {
        /**
         * @var $model TeacherAttendance
         */
        $model = parent::autoMap($dbModel, new TeacherAttendance());
        return $model;
    }

    /**
     * @param TeacherAttendance $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}