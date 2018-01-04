<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class Voucher extends Model implements ModelInterface
{
    
 	private $id = null;
 	private $campusId = 0;
 	private $description = null;
 	private $dueDate = null;//DummyProps

    public function __construct($id = null, $campusId = 0, $description = null, $dueDate = null/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setCampusId($campusId);
 	 	$this->setDescription($description);
 	 	$this->setDueDate($dueDate);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'campusId' => $this->getCampusId(), 
 	 	 	'description' => $this->getDescription(), 
 	 	 	'dueDate' => $this->getDueDate()//DummyToArray
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
     * @return $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    /**
     * @return $dueDate
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param $dueDate
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }


//DummyGetterSetters
}