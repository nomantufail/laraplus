<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class Teacher extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $firstName = null;
 	private $lastName = null;
 	private $agentId = 0;//DummyProps

    public function __construct($id = 0, $firstName = null, $lastName = null, $agentId = 0/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setFirstName($firstName);
 	 	$this->setLastName($lastName);
 	 	$this->setAgentId($agentId);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'firstName' => $this->getFirstName(), 
 	 	 	'lastName' => $this->getLastName(), 
 	 	 	'agentId' => $this->getAgentId()//DummyToArray
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
     * @return $first_name
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $first_name
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }


    /**
     * @return $last_name
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param $last_name
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
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


//DummyGetterSetters
}