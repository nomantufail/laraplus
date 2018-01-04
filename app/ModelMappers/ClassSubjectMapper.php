<?php
namespace ModelMappers;


use Models\ClassSubject;

class ClassSubjectMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return ClassSubject
     */
    public  function map($dbModel)
    {
        /**
         * @var $model ClassSubject
         */
        $model = parent::autoMap($dbModel, new ClassSubject());
        return $model;
    }

    /**
     * @param ClassSubject $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}