<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class CampusDatesheet extends Model implements ModelInterface
{
    
 	private $id = null;
 	private $title = null;
 	private $createdById = 0;
 	private $examTypeId = 0;
 	private $startingFrom = null;
 	private $uniqueIdentity = null;
 	private $resultStatus = null;
 	private $notes = null;//DummyProps

    public function __construct($id = null, $title = null, $createdById = 0, $examTypeId = 0, $startingFrom = null, $uniqueIdentity = null, $resultStatus = null, $notes = null/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setTitle($title);
 	 	$this->setCreatedById($createdById);
 	 	$this->setExamTypeId($examTypeId);
 	 	$this->setStartingFrom($startingFrom);
 	 	$this->setUniqueIdentity($uniqueIdentity);
 	 	$this->setResultStatus($resultStatus);
 	 	$this->setNotes($notes);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'title' => $this->getTitle(), 
 	 	 	'createdById' => $this->getCreatedById(), 
 	 	 	'examTypeId' => $this->getExamTypeId(), 
 	 	 	'startingFrom' => $this->getStartingFrom(), 
 	 	 	'uniqueIdentity' => $this->getUniqueIdentity(), 
 	 	 	'resultStatus' => $this->getResultStatus(), 
 	 	 	'notes' => $this->getNotes()//DummyToArray
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
     * @return $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


    /**
     * @return $createdById
     */
    public function getCreatedById()
    {
        return $this->createdById;
    }

    /**
     * @param $createdById
     */
    public function setCreatedById($createdById)
    {
        $this->createdById = $createdById;
    }


    /**
     * @return $examTypeId
     */
    public function getExamTypeId()
    {
        return $this->examTypeId;
    }

    /**
     * @param $examTypeId
     */
    public function setExamTypeId($examTypeId)
    {
        $this->examTypeId = $examTypeId;
    }


    /**
     * @return $startingFrom
     */
    public function getStartingFrom()
    {
        return $this->startingFrom;
    }

    /**
     * @param $startingFrom
     */
    public function setStartingFrom($startingFrom)
    {
        $this->startingFrom = $startingFrom;
    }


    /**
     * @return $uniqueIdentity
     */
    public function getUniqueIdentity()
    {
        return $this->uniqueIdentity;
    }

    /**
     * @param $uniqueIdentity
     */
    public function setUniqueIdentity($uniqueIdentity)
    {
        $this->uniqueIdentity = $uniqueIdentity;
    }


    /**
     * @return $resultStatus
     */
    public function getResultStatus()
    {
        return $this->resultStatus;
    }

    /**
     * @param $resultStatus
     */
    public function setResultStatus($resultStatus)
    {
        $this->resultStatus = $resultStatus;
    }


    /**
     * @return $notes
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }


//DummyGetterSetters
}