<?php
namespace ModelMappers;


use Models\FeeStructure;

class FeeStructureMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return FeeStructure
     */
    public function map($dbModel)
    {
        /**
         * @var $model FeeStructure
         */
        $model = $this->autoMap($dbModel, new FeeStructure());
        return $model;
    }

    /**
     * @param FeeStructure $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return $this->autoMapOnTable($model, $properties);
    }
}