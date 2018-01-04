<?php
namespace ModelMappers;


use Models\DatesheetExam;

class DatesheetExamMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return DatesheetExam
     */
    public  function map($dbModel)
    {
        /**
         * @var $model DatesheetExam
         */
        $model = parent::autoMap($dbModel, new DatesheetExam());
        return $model;
    }

    /**
     * @param DatesheetExam $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}