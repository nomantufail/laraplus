<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class LeaveReason extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $reason = null;//DummyProps

    public function __construct($id = 0, $reason = null/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setReason($reason);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'reason' => $this->getReason()//DummyToArray
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
     * @return $reason
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }


//DummyGetterSetters
}