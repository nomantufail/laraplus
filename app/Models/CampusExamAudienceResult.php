<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class CampusExamAudienceResult extends Model implements ModelInterface
{
    
 	private $id = null;
 	private $campusExamId = 0;
 	private $studentId = 0;
 	private $obtainedMarks = 0;
 	private $instructorComments = null;//DummyProps

    public function __construct($id = null, $campusExamId = 0, $studentId = 0, $obtainedMarks = 0, $instructorComments = null/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setCampusExamId($campusExamId);
 	 	$this->setStudentId($studentId);
 	 	$this->setObtainedMarks($obtainedMarks);
 	 	$this->setInstructorComments($instructorComments);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'campusExamId' => $this->getCampusExamId(), 
 	 	 	'studentId' => $this->getStudentId(), 
 	 	 	'obtainedMarks' => $this->getObtainedMarks(), 
 	 	 	'instructorComments' => $this->getInstructorComments()//DummyToArray
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
     * @return $campusExamId
     */
    public function getCampusExamId()
    {
        return $this->campusExamId;
    }

    /**
     * @param $campusExamId
     */
    public function setCampusExamId($campusExamId)
    {
        $this->campusExamId = $campusExamId;
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
     * @return $obtainedMarks
     */
    public function getObtainedMarks()
    {
        return $this->obtainedMarks;
    }

    /**
     * @param $obtainedMarks
     */
    public function setObtainedMarks($obtainedMarks)
    {
        $this->obtainedMarks = $obtainedMarks;
    }


    /**
     * @return $instructorComments
     */
    public function getInstructorComments()
    {
        return $this->instructorComments;
    }

    /**
     * @param $instructorComments
     */
    public function setInstructorComments($instructorComments)
    {
        $this->instructorComments = $instructorComments;
    }


//DummyGetterSetters
}