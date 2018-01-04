<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class SstSid extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $sectionSubjectTimingId = 0;
 	private $studentId = 0;//DummyProps

    public function __construct($id = 0, $sectionSubjectTimingId = 0, $studentId = 0/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setSectionSubjectTimingId($sectionSubjectTimingId);
 	 	$this->setStudentId($studentId);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'sectionSubjectTimingId' => $this->getSectionSubjectTimingId(), 
 	 	 	'studentId' => $this->getStudentId()//DummyToArray
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
     * @return $sectionSubjectTimingId
     */
    public function getSectionSubjectTimingId()
    {
        return $this->sectionSubjectTimingId;
    }

    /**
     * @param $sectionSubjectTimingId
     */
    public function setSectionSubjectTimingId($sectionSubjectTimingId)
    {
        $this->sectionSubjectTimingId = $sectionSubjectTimingId;
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


//DummyGetterSetters
}