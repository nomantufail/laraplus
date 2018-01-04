<?php
namespace Models;


use App\Exceptions\ValidationErrorException;
use Models\Model;
use Models\ModelInterface;

class UserLogin extends Model implements ModelInterface
{
    
 	private $id = null;
 	private $userId = 0;
 	private $sessionToken = null;
 	private $active = 0;
 	private $deviceid = null;
 	private $createdAt = null;
 	private $updatedAt = null;//DummyProps

    public function __construct($id = null, $userId = 0, $sessionToken = null, $active = 0, $deviceid = null, $createdAt = null, $updatedAt = null/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setUserId($userId);
 	 	$this->setSessionToken($sessionToken);
 	 	$this->setActive($active);
 	 	$this->setDeviceid($deviceid);
 	 	$this->setCreatedAt($createdAt);
 	 	$this->setUpdatedAt($updatedAt);//DummyConstructSetters
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
 	 	 	'deviceid' => $this->getDeviceid(), 
 	 	 	'createdAt' => $this->getCreatedAt(), 
 	 	 	'updatedAt' => $this->getUpdatedAt()//DummyToArray
        ];
    }

    //
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
     * @return $userId
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }


    /**
     * @return $sessionToken
     */
    public function getSessionToken()
    {
        return $this->sessionToken;
    }

    /**
     * @param $sessionToken
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


    /**
     * @return $createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }


    /**
     * @return $updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }


//DummyGetterSetters
}