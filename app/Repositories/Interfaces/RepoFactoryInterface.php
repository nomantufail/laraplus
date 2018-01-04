<?php
namespace RepoInterfaces;


use Models\EdClass;
use Repositories\Repository;

interface RepoFactoryInterface
{

    /**
     * @return Repository
     */
    public function getRepo();
}