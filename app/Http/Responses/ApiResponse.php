<?php
/**
 * Created by PhpStorm.
 * User: waqas
 * Date: 3/16/2016
 * Time: 1:46 PM
 */

namespace Responses;

use Libs\Auth\Auth;

class ApiResponse extends Response implements ResponseInterface
{

    public function setHttpStatus($status)
    {
        $this->HTTP_STATUS = $status;
        return $this;
    }

    public function getHttpStatus()
    {
        return $this->HTTP_STATUS;
    }

    public function setCustomStatus($status)
    {
        $this->CUSTOM_STATUS = $status;
        return $this;
    }

    public function getCustomStatus()
    {
        return $this->CUSTOM_STATUS;
    }

    public function setErrorMessages($messages)
    {
        $this->ERROR_MESSAGES = $messages;
        return $this;
    }

    public function getErrorMessages()
    {
        return $this->ERROR_MESSAGES;
    }


    /**
     * @param $response
     * @param $headers
     * @return json
     * @description
     * following function accepts data from
     * controllers and return a pre-setted view.
     **/
    public function respond(array $response = [], array $headers = []){
        $response['status'] = ($this->getHttpStatus() == 200)?1:0;
        $response['message'] = (isset($response['message']))?$response['message']:(($response['status'] == 1)?config('constants.SUCCESS_MESSAGE'):config('constants.ERROR_MESSAGE'));
        $response['access_token'] = (!isset($response['access_token']))?(self::getAccessToken()):$response['access_token'];
        return response()->json($response, $this->getHttpStatus(), $headers);
    }

    public function respondWithErrors()
    {
        return $this->respond([
            'status' => 0,
            'error' => [
                'messages' => $this->getErrorMessages(),
                'code' => $this->getCustomStatus(),
                'http_status' => $this->getHttpStatus(),
            ],
            'data' => null
        ]);
    }

    protected function respondWithValidationErrors()
    {
        return $this->respondWithErrors();
    }
}