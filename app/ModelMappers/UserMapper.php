<?php
namespace ModelMappers;


use Models\User;

class UserMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return User
     */
    public function map($dbModel)
    {
        /**
         * @var $model User
         */
        $model = $this->autoMap($dbModel, new User());
        return $model;
    }

    /**
     * @param User $model
     * @param array $properties
     * @return array
     */
    public function mapOnTable($model, $properties = [])
    {
       return $this->autoMapOnTable($model, $properties);
    }
}