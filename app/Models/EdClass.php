<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class EdClass extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $name = null;
 	private $address = '';//DummyProps

    public function __construct($id = 0, $name = null, $address = '' /*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setName($name);
 	 	$this->setAddress($address);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'name' => $this->getName(), 
 	 	 	'address' => $this->getAddress()//DummyToArray
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



    /**
     * @return $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }


//DummyGetterSetters
}