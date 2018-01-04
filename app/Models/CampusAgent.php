<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class CampusAgent extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $campusId = 0;
 	private $agentId = 0;//DummyProps

    public function __construct($id = 0, $campusId = 0, $agentId = 0/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setCampusId($campusId);
 	 	$this->setAgentId($agentId);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'campusId' => $this->getCampusId(), 
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
     * @return $campus_id
     */
    public function getCampusId()
    {
        return $this->campusId;
    }

    /**
     * @param $campus_id
     */
    public function setCampusId($campusId)
    {
        $this->campusId = $campusId;
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