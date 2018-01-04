<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class CampusClass extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $campuseId = 0;
 	private $className = null;//DummyProps

    public function __construct($id = 0, $campuseId = 0, $className = null/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setCampuseId($campuseId);
 	 	$this->setClassName($className);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'campuseId' => $this->getCampuseId(), 
 	 	 	'className' => $this->getClassName()//DummyToArray
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
     * @return $campuse_id
     */
    public function getCampuseId()
    {
        return $this->campuseId;
    }

    /**
     * @param $campuse_id
     */
    public function setCampuseId($campuseId)
    {
        $this->campuseId = $campuseId;
    }


    /**
     * @return $class_name
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @param $class_name
     */
    public function setClassName($className)
    {
        $this->className = $className;
    }


//DummyGetterSetters
}