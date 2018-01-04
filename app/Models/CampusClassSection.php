<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class CampusClassSection extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $campusClassId = 0;
 	private $sectionName = null;
 	private $inchargeId = 0;//DummyProps

    public function __construct($id = 0, $campusClassId = 0, $sectionName = null, $inchargeId = 0/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setCampusClassId($campusClassId);
 	 	$this->setSectionName($sectionName);
 	 	$this->setInchargeId($inchargeId);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'campusClassId' => $this->getCampusClassId(), 
 	 	 	'sectionName' => $this->getSectionName(), 
 	 	 	'inchargeId' => $this->getInchargeId()//DummyToArray
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
     * @return $campus_class_id
     */
    public function getCampusClassId()
    {
        return $this->campusClassId;
    }

    /**
     * @param $campus_class_id
     */
    public function setCampusClassId($campusClassId)
    {
        $this->campusClassId = $campusClassId;
    }


    /**
     * @return $section_name
     */
    public function getSectionName()
    {
        return $this->sectionName;
    }

    /**
     * @param $section_name
     */
    public function setSectionName($sectionName)
    {
        $this->sectionName = $sectionName;
    }


    /**
     * @return $incharge_id
     */
    public function getInchargeId()
    {
        return $this->inchargeId;
    }

    /**
     * @param $incharge_id
     */
    public function setInchargeId($inchargeId)
    {
        $this->inchargeId = $inchargeId;
    }


//DummyGetterSetters
}