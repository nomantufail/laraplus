<?php
namespace ModelMappers;


use Models\SectionSubjectTiming;

class SectionSubjectTimingMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return SectionSubjectTiming
     */
    public  function map($dbModel)
    {
        /**
         * @var $model SectionSubjectTiming
         */
        $model = parent::autoMap($dbModel, new SectionSubjectTiming());
        return $model;
    }

    /**
     * @param SectionSubjectTiming $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}