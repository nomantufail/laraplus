<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class Subject extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $name = null;//DummyProps

    public function __construct($id = 0, $name = null/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setName($name);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'name' => $this->getName()//DummyToArray
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
     * @return $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


//DummyGetterSetters
}