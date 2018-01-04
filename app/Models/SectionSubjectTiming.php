<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class SectionSubjectTiming extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $campusClassSectionId = 0;
 	private $subjectId = 0;
 	private $startTime = null;
 	private $endTime = null;//DummyProps

    public function __construct($id = 0, $campusClassSectionId = 0, $subjectId = 0, $startTime = null, $endTime = null/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setCampusClassSectionId($campusClassSectionId);
 	 	$this->setSubjectId($subjectId);
 	 	$this->setStartTime($startTime);
 	 	$this->setEndTime($endTime);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'campusClassSectionId' => $this->getCampusClassSectionId(), 
 	 	 	'subjectId' => $this->getSubjectId(), 
 	 	 	'startTime' => $this->getStartTime(), 
 	 	 	'endTime' => $this->getEndTime()//DummyToArray
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
     * @return $campusClassSectionId
     */
    public function getCampusClassSectionId()
    {
        return $this->campusClassSectionId;
    }

    /**
     * @param $campusClassSectionId
     */
    public function setCampusClassSectionId($campusClassSectionId)
    {
        $this->campusClassSectionId = $campusClassSectionId;
    }


    /**
     * @return $subjectId
     */
    public function getSubjectId()
    {
        return $this->subjectId;
    }

    /**
     * @param $subjectId
     */
    public function setSubjectId($subjectId)
    {
        $this->subjectId = $subjectId;
    }


    /**
     * @return $startTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }


    /**
     * @return $endTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }


//DummyGetterSetters
}