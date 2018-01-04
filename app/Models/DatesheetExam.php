<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class DatesheetExam extends Model implements ModelInterface
{
    
 	private $id = null;
 	private $campusDatesheetId = 0;
 	private $campusExamId = 0;//DummyProps

    public function __construct($id = null, $campusDatesheetId = 0, $campusExamId = 0/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setCampusDatesheetId($campusDatesheetId);
 	 	$this->setCampusExamId($campusExamId);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'campusDatesheetId' => $this->getCampusDatesheetId(), 
 	 	 	'campusExamId' => $this->getCampusExamId()//DummyToArray
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
     * @return $campusDatesheetId
     */
    public function getCampusDatesheetId()
    {
        return $this->campusDatesheetId;
    }

    /**
     * @param $campusDatesheetId
     */
    public function setCampusDatesheetId($campusDatesheetId)
    {
        $this->campusDatesheetId = $campusDatesheetId;
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


//DummyGetterSetters
}