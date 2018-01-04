<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class SstTid extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $sectionSubjectTimingId = 0;
 	private $teacherId = 0;//DummyProps

    public function __construct($id = 0, $sectionSubjectTimingId = 0, $teacherId = 0/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setSectionSubjectTimingId($sectionSubjectTimingId);
 	 	$this->setTeacherId($teacherId);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'sectionSubjectTimingId' => $this->getSectionSubjectTimingId(), 
 	 	 	'teacherId' => $this->getTeacherId()//DummyToArray
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


//DummyGetterSetters
}