<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class CampusExamType extends Model implements ModelInterface
{
    
 	private $id = null;
 	private $campusId = 0;
 	private $type = null;//DummyProps

    public function __construct($id = null, $campusId = 0, $type = null/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setCampusId($campusId);
 	 	$this->setType($type);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'campusId' => $this->getCampusId(), 
 	 	 	'type' => $this->getType()//DummyToArray
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
     * @return $campusId
     */
    public function getCampusId()
    {
        return $this->campusId;
    }

    /**
     * @param $campusId
     */
    public function setCampusId($campusId)
    {
        $this->campusId = $campusId;
    }


    /**
     * @return $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


//DummyGetterSetters
}