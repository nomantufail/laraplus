<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class Session extends Model implements ModelInterface
{
    
 	private $id = 0;
 	private $title = null;
 	private $start = null;
 	private $end = null;//DummyProps

    public function __construct($id = 0, $title = null, $start = null, $end = null/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setTitle($title);
 	 	$this->setStart($start);
 	 	$this->setEnd($end);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'title' => $this->getTitle(), 
 	 	 	'start' => $this->getStart(), 
 	 	 	'end' => $this->getEnd()//DummyToArray
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


    /**
     * @return $start
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }


    /**
     * @return $end
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }


//DummyGetterSetters
}