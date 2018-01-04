<?php
namespace ModelMappers;


use Models\Role;

class RoleMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return Role
     */
    public  function map($dbModel)
    {
        /**
         * @var $model Role
         */
        $model = parent::autoMap($dbModel, new Role());
        return $model;
    }

    /**
     * @param Role $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}