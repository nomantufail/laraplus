<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class Institute extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $name = null;
 	private $headOfficeAddr = null;//DummyProps

    public function __construct($id = 0, $name = null, $headOfficeAddr = null /*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setName($name);
 	 	$this->setHeadOfficeAddr($headOfficeAddr);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'name' => $this->getName(), 
 	 	 	'headOfficeAddr' => $this->getHeadOfficeAddr()//DummyToArray
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
     * @return $head_office_addr
     */
    public function getHeadOfficeAddr()
    {
        return $this->headOfficeAddr;
    }

    /**
     * @param $head_office_addr
     */
    public function setHeadOfficeAddr($headOfficeAddr)
    {
        $this->headOfficeAddr = $headOfficeAddr;
    }

//DummyGetterSetters
}