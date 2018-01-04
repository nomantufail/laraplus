<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class AgentType extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $agentType = null;//DummyProps

    public function __construct($id = 0, $agentType = null/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setAgentType($agentType);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'agentType' => $this->getAgentType()//DummyToArray
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
     * @return $agent_type
     */
    public function getAgentType()
    {
        return $this->agentType;
    }

    /**
     * @param $agent_type
     */
    public function setAgentType($agentType)
    {
        $this->agentType = $agentType;
    }


//DummyGetterSetters
}