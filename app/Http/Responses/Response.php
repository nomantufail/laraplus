<?php
/**
 * Created by PhpStorm.
 * User: waqas
 * Date: 3/16/2016
 * Time: 1:46 PM
 */

namespace Responses;

use Traits\RequestHelper;

abstract class Response
{
    use RequestHelper;

    protected $CUSTOM_STATUS = 0;
    protected $HTTP_STATUS = 200;
    protected $ERROR_MESSAGES = [];

    const AUTHENTICATION_FAILED = 401;
    public abstract function respondWithErrors();

    protected abstract function respondWithValidationErrors();

    protected abstract function respond();

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

    public function respondNotFound($messages = ["record not found"])
    {
        return $this->setHttpStatus(404)->setCustomStatus(404)->setErrorMessages($messages)->respondWithErrors();
    }

    public function respondInternalServerError($messages = ["Something went wrong with the server!"])
    {
        return $this->setHttpStatus(500)->setCustomStatus(505)->setErrorMessages($messages)->respondWithErrors();
    }

    public function respondValidationFails($messages = ["Your request did not passed our server requirements!"])
    {
        return $this->setHttpStatus(400)->setCustomStatus(400)->setErrorMessages($messages)->respondWithValidationErrors();
    }

    public function respondAuthenticationFailed($messages = ["Dear user you are not logged in."])
    {
        return $this->setHttpStatus(self::AUTHENTICATION_FAILED)->setCustomStatus(self::AUTHENTICATION_FAILED)->setErrorMessages($messages)->respondWithErrors();
    }

    public function respondInvalidCredentials($messages = ["Invalid username or password"])
    {
        return $this->setHttpStatus(404)->setCustomStatus(404)->setErrorMessages($messages)->respondWithErrors();
    }

    public function respondAccessTokenNotProvided($messages = ["Session expired, please login again."])
    {
        return $this->setHttpStatus(404)->setCustomStatus(404)->setErrorMessages($messages)->respondWithErrors();
    }

    public function respondInvalidAccessToken($messages = ["Session expired, please login again."])
    {
        return $this->setHttpStatus(404)->setCustomStatus(404)->setErrorMessages($messages)->respondWithErrors();
    }

    public function respondOwnershipConstraintViolation($messages = ["Ownership Constraint Violation."])
    {
        return $this->setHttpStatus(404)->setCustomStatus(404)->setErrorMessages($messages)->respondWithErrors();
    }

}