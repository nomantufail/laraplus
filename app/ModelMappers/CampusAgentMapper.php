<?php
namespace ModelMappers;


use Models\CampusAgent;

class CampusAgentMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return CampusAgent
     */
    public function map($dbModel)
    {
        /**
         * @var $model CampusAgent
         */
        $model = parent::autoMap($dbModel, new CampusAgent());
        return $model;
    }

    /**
     * @param CampusAgent $model
     * @param array $properties
     * @return array
     */
    public function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}