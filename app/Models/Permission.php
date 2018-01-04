<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class Permission extends Model implements ModelInterface
{
    
 	private $id = 0;//DummyProps

    public function __construct($id = 0/*DummyConstructArgs*/){
        
 	 	$this->setId($id);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId()//DummyToArray
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


//DummyGetterSetters
}