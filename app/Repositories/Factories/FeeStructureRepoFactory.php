<?php
namespace RepoFactories;


use RepoInterfaces\RepoFactoryInterface;
use Repositories\FeeStructureRepository;

class FeeStructureRepoFactory implements RepoFactoryInterface
{
    /**
     * @return FeeStructureRepository
     */
    public function getRepo()
    {
        return new FeeStructureRepository();
    }
}