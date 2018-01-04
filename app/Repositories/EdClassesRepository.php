<?php
/**
 * Created by PhpStorm.
 * user: nomantufail
 * Date: 10/10/2016
 * Time: 10:13 AM
 */

namespace Repositories;

use Illuminate\Support\Facades\DB;
use Repositories\Repository;
use RepoInterfaces\EdClassesRepoInterface;
use ModelMappers\EdClassMapper;

class EdClassesRepository extends Repository implements EdClassesRepoInterface
{

    private $modelMapper = null;
    public function __construct()
    {
        $this->modelMapper = null;
    }

    public function getClassesWithDetails()
    {
        //TODO: real implementation pending.
        $data = (new EdClassMapper())->map(null);
        return [$data];
    }
}