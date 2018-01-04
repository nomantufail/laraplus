<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class ClassSubject extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $campusClassId = 0;
 	private $subjectId = 0;//DummyProps

    public function __construct($id = 0, $campusClassId = 0, $subjectId = 0/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setCampusClassId($campusClassId);
 	 	$this->setSubjectId($subjectId);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'campusClassId' => $this->getCampusClassId(), 
 	 	 	'subjectId' => $this->getSubjectId()//DummyToArray
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
     * @return $subject_id
     */
    public function getSubjectId()
    {
        return $this->subjectId;
    }

    /**
     * @param $subject_id
     */
    public function setSubjectId($subjectId)
    {
        $this->subjectId = $subjectId;
    }


//DummyGetterSetters
}