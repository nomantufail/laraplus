<?php
/**
 * Created by PhpStorm.
 * User: officeaccount
 * Date: 28/02/2017
 * Time: 3:54 PM
 */

namespace Models;


use App\Exceptions\ValidationErrorException;

abstract class Paginate extends Model
{

    public $currentPage = 1;
    public $totalPages = 2;
    public $totalRecords = 1;
    public $data = [];

    public function __construct(){}

    public function toArray()
    {
        return [
            'currentPage' => $this->currentPage,
            'totalPages' => $this->totalPages,
            'totalRecords' => $this->totalRecords,
            'data' => $this->data
        ];
    }
}