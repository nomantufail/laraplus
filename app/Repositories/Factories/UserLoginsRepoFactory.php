<?php
namespace RepoFactories;


use RepoInterfaces\RepoFactoryInterface;
use Repositories\UserLoginsRepository;

class UserLoginsRepoFactory implements RepoFactoryInterface
{
    /**
     * @return UserLoginsRepository
     */
    public function getRepo()
    {
        return new UserLoginsRepository();
    }
}