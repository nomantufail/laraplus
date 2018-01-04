<?php
namespace ModelMappers;


use Models\UserLogin;

class UserLoginMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return UserLogin
     */
    public  function map($dbModel)
    {
        /**
         * @var $model UserLogin
         */
        $model = parent::autoMap($dbModel, new UserLogin());
        return $model;
    }

    /**
     * @param UserLogin $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}