<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class TeacherSkill extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $teacherId = 0;
 	private $campusClassId = 0;
 	private $subjectId = 0;//DummyProps

    public function __construct($id = 0, $teacherId = 0, $campusClassId = 0, $subjectId = 0/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setTeacherId($teacherId);
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
 	 	 	'teacherId' => $this->getTeacherId(), 
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
     * @return $teacherId
     */
    public function getTeacherId()
    {
        return $this->teacherId;
    }

    /**
     * @param $teacherId
     */
    public function setTeacherId($teacherId)
    {
        $this->teacherId = $teacherId;
    }


    /**
     * @return $campusClassId
     */
    public function getCampusClassId()
    {
        return $this->campusClassId;
    }

    /**
     * @param $campusClassId
     */
    public function setCampusClassId($campusClassId)
    {
        $this->campusClassId = $campusClassId;
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


//DummyGetterSetters
}