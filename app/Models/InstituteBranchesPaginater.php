<?php
/**
 * Created by PhpStorm.
 * User: officeaccount
 * Date: 28/02/2017
 * Time: 3:54 PM
 */

namespace Models;


use App\Exceptions\ValidationErrorException;

class InstituteBranchesPaginater extends Paginate
{

    /**
     * @var InstituteBranch[]
     */
    public $data = [];
    public function __construct()
    {
        parent::__construct();
    }
}