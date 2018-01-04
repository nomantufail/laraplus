<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class CampusExam extends Model implements ModelInterface
{
    
 	private $id = null;
 	private $campusId = 0;
 	private $campusExamTypeId = 0;
 	private $examTitle = null;
 	private $subjectId = 0;
 	private $examDate = null;
 	private $startTime = null;
 	private $endTime = null;
 	private $totalMarks = 0;
 	private $passingMarks = 0;
 	private $createById = 0;
 	private $duration = 0;//DummyProps

    public function __construct($id = null, $campusId = 0, $campusExamTypeId = 0, $examTitle = null, $subjectId = 0, $examDate = null, $startTime = null, $endTime = null, $totalMarks = 0, $passingMarks = 0, $createById = 0, $duration = 0/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setCampusId($campusId);
 	 	$this->setCampusExamTypeId($campusExamTypeId);
 	 	$this->setExamTitle($examTitle);
 	 	$this->setSubjectId($subjectId);
 	 	$this->setExamDate($examDate);
 	 	$this->setStartTime($startTime);
 	 	$this->setEndTime($endTime);
 	 	$this->setTotalMarks($totalMarks);
 	 	$this->setPassingMarks($passingMarks);
 	 	$this->setCreateById($createById);
 	 	$this->setDuration($duration);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'campusId' => $this->getCampusId(), 
 	 	 	'campusExamTypeId' => $this->getCampusExamTypeId(), 
 	 	 	'examTitle' => $this->getExamTitle(), 
 	 	 	'subjectId' => $this->getSubjectId(), 
 	 	 	'examDate' => $this->getExamDate(), 
 	 	 	'startTime' => $this->getStartTime(), 
 	 	 	'endTime' => $this->getEndTime(), 
 	 	 	'totalMarks' => $this->getTotalMarks(), 
 	 	 	'passingMarks' => $this->getPassingMarks(), 
 	 	 	'createById' => $this->getCreateById(), 
 	 	 	'duration' => $this->getDuration()//DummyToArray
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
     * @return $campusExamTypeId
     */
    public function getCampusExamTypeId()
    {
        return $this->campusExamTypeId;
    }

    /**
     * @param $campusExamTypeId
     */
    public function setCampusExamTypeId($campusExamTypeId)
    {
        $this->campusExamTypeId = $campusExamTypeId;
    }


    /**
     * @return $examTitle
     */
    public function getExamTitle()
    {
        return $this->examTitle;
    }

    /**
     * @param $examTitle
     */
    public function setExamTitle($examTitle)
    {
        $this->examTitle = $examTitle;
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
     * @return $examDate
     */
    public function getExamDate()
    {
        return $this->examDate;
    }

    /**
     * @param $examDate
     */
    public function setExamDate($examDate)
    {
        $this->examDate = $examDate;
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


    /**
     * @return $totalMarks
     */
    public function getTotalMarks()
    {
        return $this->totalMarks;
    }

    /**
     * @param $totalMarks
     */
    public function setTotalMarks($totalMarks)
    {
        $this->totalMarks = $totalMarks;
    }


    /**
     * @return $passingMarks
     */
    public function getPassingMarks()
    {
        return $this->passingMarks;
    }

    /**
     * @param $passingMarks
     */
    public function setPassingMarks($passingMarks)
    {
        $this->passingMarks = $passingMarks;
    }


    /**
     * @return $createById
     */
    public function getCreateById()
    {
        return $this->createById;
    }

    /**
     * @param $createById
     */
    public function setCreateById($createById)
    {
        $this->createById = $createById;
    }


    /**
     * @return $duration
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }


//DummyGetterSetters
}