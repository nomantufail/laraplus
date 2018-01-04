<?php
namespace ModelMappers;


use Models\Teacher;

class TeacherMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return Teacher
     */
    public  function map($dbModel)
    {
        /**
         * @var $model Teacher
         */
        $model = parent::autoMap($dbModel, new Teacher());
        return $model;
    }

    /**
     * @param Teacher $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}