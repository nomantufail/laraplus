<?php
namespace ModelMappers;


use Models\Agent;

class AgentMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return Agent
     */
    public function map($dbModel)
    {
        /**
         * @var $model Agent
         */
        $model = parent::autoMap($dbModel, new Agent());
        return $model;
    }

    /**
     * @param Agent $model
     * @param array $properties
     * @return array
     */
    public function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}