<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class FeeStructure extends Model implements ModelInterface
{
    
 	private $id = null;
 	private $sectionId = 0;
 	private $transactionTypeId = 0;//DummyProps

    public function __construct($id = null, $sectionId = 0, $transactionTypeId = 0/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setSectionId($sectionId);
 	 	$this->setTransactionTypeId($transactionTypeId);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'sectionId' => $this->getSectionId(), 
 	 	 	'transactionTypeId' => $this->getTransactionTypeId()//DummyToArray
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
     * @return $sectionId
     */
    public function getSectionId()
    {
        return $this->sectionId;
    }

    /**
     * @param $sectionId
     */
    public function setSectionId($sectionId)
    {
        $this->sectionId = $sectionId;
    }


    /**
     * @return $transactionTypeId
     */
    public function getTransactionTypeId()
    {
        return $this->transactionTypeId;
    }

    /**
     * @param $transactionTypeId
     */
    public function setTransactionTypeId($transactionTypeId)
    {
        $this->transactionTypeId = $transactionTypeId;
    }


//DummyGetterSetters
}