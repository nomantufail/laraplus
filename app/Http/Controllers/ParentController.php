<?php

namespace App\Http\Controllers;


use Responses\ResponseFactory;
use Traits\RequestHelper;

class ParentController extends Controller
{
    use RequestHelper;
    public $notificationsRepo = null;

    /**
     * @var \Responses\Response
     */
    protected $response = null;


    public function __construct()
    {
        $this->response = ResponseFactory::getInstance();
    }

}
