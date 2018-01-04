<?php
namespace Models;


use App\Exceptions\ValidationErrorException;
use Models\Model;
use Models\ModelInterface;

class User extends Model implements ModelInterface
{
    
 	private $id = null;
 	private $username = null;
 	private $password = null;
 	private $createdAt = null;
 	private $updatedAt = null;//DummyProps

    public function __construct($id = null, $username = null, $password = null, $createdAt = null, $updatedAt = null/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setUsername($username);
 	 	$this->setPassword($password);
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
 	 	 	'username' => $this->getUsername(), 
 	 	 	'password' => $this->getPassword(), 
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
     * @return $username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }


    /**
     * @return $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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