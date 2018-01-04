<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class StudentGuardian extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $studentId = 0;
 	private $guardianId = 0;//DummyProps

    public function __construct($id = 0, $studentId = 0, $guardianId = 0/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setStudentId($studentId);
 	 	$this->setGuardianId($guardianId);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'studentId' => $this->getStudentId(), 
 	 	 	'guardianId' => $this->getGuardianId()//DummyToArray
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
     * @return $student_id
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * @param $student_id
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    }


    /**
     * @return $guardian_id
     */
    public function getGuardianId()
    {
        return $this->guardianId;
    }

    /**
     * @param $guardian_id
     */
    public function setGuardianId($guardianId)
    {
        $this->guardianId = $guardianId;
    }


//DummyGetterSetters
}