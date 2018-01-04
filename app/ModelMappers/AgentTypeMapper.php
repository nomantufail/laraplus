<?php
namespace ModelMappers;


use Models\AgentType;

class AgentTypeMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return AgentType
     */
    public function map($dbModel)
    {
        /**
         * @var $model AgentType
         */
        $model = parent::autoMap($dbModel, new AgentType());
        return $model;
    }

    /**
     * @param AgentType $model
     * @param array $properties
     * @return array
     */
    public function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}