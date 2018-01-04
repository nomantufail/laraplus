<?php
namespace ModelMappers;


use Models\EdClass;
use Models\EdClassDetails;

class EdClassMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return EdClass
     */
    public  function map($dbModel)
    {
        //TODO: real implementation pending.
        return new EdClassDetails();
    }

    /**
     * @param EdClass $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}