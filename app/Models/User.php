<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class User extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $username = null;
 	private $password = null;
 	private $agentId = 0;
 	private $foo = '';//DummyProps

    public function __construct($id = 0, $username = null, $password = null, $agentId = 0, $foo = '' /*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setUsername($username);
 	 	$this->setPassword($password);
 	 	$this->setAgentId($agentId);
 	 	$this->setFoo($foo);//DummyConstructSetters
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
 	 	 	'agentId' => $this->getAgentId(), 
 	 	 	'foo' => $this->getFoo()//DummyToArray
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
     * @return $agent_id
     */
    public function getAgentId()
    {
        return $this->agentId;
    }

    /**
     * @param $agent_id
     */
    public function setAgentId($agentId)
    {
        $this->agentId = $agentId;
    }



    /**
     * @return $foo
     */
    public function getFoo()
    {
        return $this->foo;
    }

    /**
     * @param $foo
     */
    public function setFoo($foo)
    {
        $this->foo = $foo;
    }


//DummyGetterSetters
}