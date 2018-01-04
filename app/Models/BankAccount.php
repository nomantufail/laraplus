<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class BankAccount extends Model implements ModelInterface
{
    
 	private $id = null;
 	private $campusId = 0;
 	private $bank = null;
 	private $accountNumber = null;//DummyProps

    public function __construct($id = null, $campusId = 0, $bank = null, $accountNumber = null/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setCampusId($campusId);
 	 	$this->setBank($bank);
 	 	$this->setAccountNumber($accountNumber);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'campusId' => $this->getCampusId(), 
 	 	 	'bank' => $this->getBank(), 
 	 	 	'accountNumber' => $this->getAccountNumber()//DummyToArray
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
     * @return $campusId
     */
    public function getCampusId()
    {
        return $this->campusId;
    }

    /**
     * @param $campusId
     */
    public function setCampusId($campusId)
    {
        $this->campusId = $campusId;
    }


    /**
     * @return $bank
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @param $bank
     */
    public function setBank($bank)
    {
        $this->bank = $bank;
    }


    /**
     * @return $accountNumber
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param $accountNumber
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }


//DummyGetterSetters
}