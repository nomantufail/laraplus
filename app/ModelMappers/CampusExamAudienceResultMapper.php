<?php
namespace ModelMappers;


use Models\CampusExamAudienceResult;

class CampusExamAudienceResultMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return CampusExamAudienceResult
     */
    public  function map($dbModel)
    {
        /**
         * @var $model CampusExamAudienceResult
         */
        $model = parent::autoMap($dbModel, new CampusExamAudienceResult());
        return $model;
    }

    /**
     * @param CampusExamAudienceResult $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}