<?php
namespace ModelMappers;


use Models\StudentGuardian;

class StudentGuardianMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return StudentGuardian
     */
    public  function map($dbModel)
    {
        /**
         * @var $model StudentGuardian
         */
        $model = parent::autoMap($dbModel, new StudentGuardian());
        return $model;
    }

    /**
     * @param StudentGuardian $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}