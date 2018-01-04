<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class ExamType extends Model implements ModelInterface
{
    
 	private $id = null;
 	private $type = null;//DummyProps

    public function __construct($id = null, $type = null/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setType($type);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'type' => $this->getType()//DummyToArray
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
     * @return $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


//DummyGetterSetters
}