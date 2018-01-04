<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class UserLogin extends Model implements ModelInterface
{
    
 	private $id = null;
 	private $userId = 0;
 	private $sessionToken = null;
 	private $active = 0;
 	private $deviceid = null;//DummyProps

    public function __construct($id = null, $userId = 0, $sessionToken = null, $active = 0, $deviceid = null/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setUserId($userId);
 	 	$this->setSessionToken($sessionToken);
 	 	$this->setActive($active);
 	 	$this->setDeviceid($deviceid);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'userId' => $this->getUserId(), 
 	 	 	'sessionToken' => $this->getSessionToken(), 
 	 	 	'active' => $this->getActive(), 
 	 	 	'deviceid' => $this->getDeviceid()//DummyToArray
        ];
    }

    
    /**
     * @return $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return $user_id
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param $user_id
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }


    /**
     * @return $session_token
     */
    public function getSessionToken()
    {
        return $this->sessionToken;
    }

    /**
     * @param $session_token
     */
    public function setSessionToken($sessionToken)
    {
        $this->sessionToken = $sessionToken;
    }


    /**
     * @return $active
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }


    /**
     * @return $deviceid
     */
    public function getDeviceid()
    {
        return $this->deviceid;
    }

    /**
     * @param $deviceid
     */
    public function setDeviceid($deviceid)
    {
        $this->deviceid = $deviceid;
    }


//DummyGetterSetters
}