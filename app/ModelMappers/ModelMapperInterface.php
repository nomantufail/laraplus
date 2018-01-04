<?php
/**
 * Created by PhpStorm.
 * User: nomantufail
 * Date: 20/09/2017
 * Time: 5:05 PM
 */

namespace ModelMappers;


use Models\Model;

Interface ModelMapperInterface
{
    public function map($dbModel);
    public function mapOnTable($model, $properties=[]);
}