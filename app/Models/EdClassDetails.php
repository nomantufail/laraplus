<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class EdClassDetails extends Model implements ModelInterface
{
    private $id;
    private $name;
    private $noOfStudents;
    private $sections;
    private $subjects;
    private $uniqueSubjects;
    
    
    //DummyProps

    public function __construct( /*DummyConstructArgs*/){
        
 	 	//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            'id'=>$this->id,
            'name' => $this->name,
            'noOfStudents' => $this->noOfStudents,
            'sections' => $this->sections,
            'subjects' => $this->subjects,
            'uniqueSubjects' => $this->uniqueSubjects
            //DummyToArray
        ];
    }



//DummyGetterSetters
}