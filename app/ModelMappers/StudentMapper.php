<?php
namespace ModelMappers;


use Models\Student;

class StudentMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return Student
     */
    public  function map($dbModel)
    {
        /**
         * @var $model Student
         */
        $model = parent::autoMap($dbModel, new Student());
        return $model;
    }

    /**
     * @param Student $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}