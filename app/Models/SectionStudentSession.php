<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class SectionStudentSession extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $campusClassSectionId = 0;
 	private $studentId = 0;
 	private $sessionId = 0;//DummyProps

    public function __construct($id = 0, $campusClassSectionId = 0, $studentId = 0, $sessionId = 0/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setCampusClassSectionId($campusClassSectionId);
 	 	$this->setStudentId($studentId);
 	 	$this->setSessionId($sessionId);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'campusClassSectionId' => $this->getCampusClassSectionId(), 
 	 	 	'studentId' => $this->getStudentId(), 
 	 	 	'sessionId' => $this->getSessionId()//DummyToArray
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
     * @return $studentId
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * @param $studentId
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    }


    /**
     * @return $sessionId
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @param $sessionId
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    }


//DummyGetterSetters
}