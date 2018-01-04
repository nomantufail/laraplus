<?php
namespace ModelMappers;


use Models\Permission;

class PermissionMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return Permission
     */
    public  function map($dbModel)
    {
        /**
         * @var $model Permission
         */
        $model = parent::autoMap($dbModel, new Permission());
        return $model;
    }

    /**
     * @param Permission $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}