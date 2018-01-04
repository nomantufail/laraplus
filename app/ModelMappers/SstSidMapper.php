<?php
namespace ModelMappers;


use Models\SstSid;

class SstSidMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return SstSid
     */
    public  function map($dbModel)
    {
        /**
         * @var $model SstSid
         */
        $model = parent::autoMap($dbModel, new SstSid());
        return $model;
    }

    /**
     * @param SstSid $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}