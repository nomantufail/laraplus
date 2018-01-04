<?php
namespace ModelMappers;


use Models\SectionStudentSession;

class SectionStudentSessionMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return SectionStudentSession
     */
    public  function map($dbModel)
    {
        /**
         * @var $model SectionStudentSession
         */
        $model = parent::autoMap($dbModel, new SectionStudentSession());
        return $model;
    }

    /**
     * @param SectionStudentSession $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}