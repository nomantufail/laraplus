<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class Role extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $title = null;//DummyProps

    public function __construct($id = 0, $title = null/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setTitle($title);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'title' => $this->getTitle()//DummyToArray
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
     * @return $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


//DummyGetterSetters
}