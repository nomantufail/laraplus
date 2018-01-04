<?php
namespace Models\FeeStructure;


use App\Exceptions\ValidationErrorException;

class Campus
{
    
 	private $id = 0;
 	private $name = null;
    private $edClasses = null; 


    public function __construct($id = 0, $name = null, $edClasses = array()){
        
 	 	$this->setId($id);
 	 	$this->setName($name);
 	 	$this->setEdClasses($edClasses);
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

}