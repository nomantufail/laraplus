<?php
namespace ModelMappers;


use Models\CampusExam;

class CampusExamMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return CampusExam
     */
    public function map($dbModel)
    {
        /**
         * @var $model CampusExam
         */
        $model = parent::autoMap($dbModel, new CampusExam());
        return $model;
    }

    /**
     * @param CampusExam $model
     * @param array $properties
     * @return array
     */
    public function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}