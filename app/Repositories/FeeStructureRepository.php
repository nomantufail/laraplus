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
use RepoInterfaces\FeeStructureRepoInterface;
use ModelMappers\FeeStructureMapper;

class FeeStructureRepository extends Repository implements FeeStructureRepoInterface
{

    private $feeStructureMapper = null;
    private $dbFeeStructure = null;
    public function __construct()
    {
        $this->feeStructureMapper = new FeeStructureMapper();
        $this->dbFeeStructure = new \LaraModels\FeeStructure();
    }
    
    public function getBySection($sectionId){
        //todo: implement here...
        return [];
    }


    public function getFullStructure($userId = null){
        //todo: pending..
        return $this->feeStructureMapper->mapCollection(collect([new \LaraModels\FeeStructure()]));
    }

}