<?php
namespace ModelMappers;


use Models\Session;

class SessionMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return Session
     */
    public  function map($dbModel)
    {
        /**
         * @var $model Session
         */
        $model = parent::autoMap($dbModel, new Session());
        return $model;
    }

    /**
     * @param Session $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}