<?php
namespace ModelMappers;


use Models\SstTid;

class SstTidMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return SstTid
     */
    public  function map($dbModel)
    {
        /**
         * @var $model SstTid
         */
        $model = parent::autoMap($dbModel, new SstTid());
        return $model;
    }

    /**
     * @param SstTid $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}