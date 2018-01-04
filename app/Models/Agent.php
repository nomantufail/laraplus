<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class Agent extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $agentTypeId = 0;//DummyProps

    public function __construct($id = 0, $agentTypeId = 0/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setAgentTypeId($agentTypeId);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'agentTypeId' => $this->getAgentTypeId()//DummyToArray
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
     * @return $agent_type_id
     */
    public function getAgentTypeId()
    {
        return $this->agentTypeId;
    }

    /**
     * @param $agent_type_id
     */
    public function setAgentTypeId($agentTypeId)
    {
        $this->agentTypeId = $agentTypeId;
    }


//DummyGetterSetters
}