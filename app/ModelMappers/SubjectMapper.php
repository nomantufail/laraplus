<?php
namespace ModelMappers;


use Models\Subject;

class SubjectMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return Subject
     */
    public  function map($dbModel)
    {
        /**
         * @var $model Subject
         */
        $model = parent::autoMap($dbModel, new Subject());
        return $model;
    }

    /**
     * @param Subject $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}