<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class Guardian extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $name = null;
 	private $agentId = 0;//DummyProps

    public function __construct($id = 0, $name = null, $agentId = 0/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setName($name);
 	 	$this->setAgentId($agentId);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'name' => $this->getName(), 
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
     * @return $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
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