<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class Campus extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $name = null;
 	private $instituteId = 0;
 	private $address = null;
 	private $type = '';//DummyProps

    public function __construct($id = 0, $name = null, $instituteId = 0, $address = null, $type = ''/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setName($name);
 	 	$this->setInstituteId($instituteId);
 	 	$this->setAddress($address);
 	 	$this->setType($type);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'name' => $this->getName(), 
 	 	 	'instituteId' => $this->getInstituteId(), 
 	 	 	'address' => $this->getAddress(), 
 	 	 	'type' => $this->getType() //DummyToArray
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
     * @return $institute_id
     */
    public function getInstituteId()
    {
        return $this->instituteId;
    }

    /**
     * @param $institute_id
     */
    public function setInstituteId($instituteId)
    {
        $this->instituteId = $instituteId;
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