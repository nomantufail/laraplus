<?php
namespace RepoFactories;


use RepoInterfaces\RepoFactoryInterface;
use Repositories\EdClassesRepository;

class EdClassesRepoFactory implements RepoFactoryInterface
{
    /**
     * @return EdClassesRepository
     */
    public function getRepo()
    {
        return new EdClassesRepository();
    }
}