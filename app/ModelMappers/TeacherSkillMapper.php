<?php
namespace ModelMappers;


use Models\TeacherSkill;

class TeacherSkillMapper extends ModelMapper implements ModelMapperInterface
{

    /**
     * @param $dbModel
     * @return TeacherSkill
     */
    public  function map($dbModel)
    {
        /**
         * @var $model TeacherSkill
         */
        $model = parent::autoMap($dbModel, new TeacherSkill());
        return $model;
    }

    /**
     * @param TeacherSkill $model
     * @param array $properties
     * @return array
     */
    public  function mapOnTable($model, $properties = [])
    {
       return parent::autoMapOnTable($model, $properties);
    }
}