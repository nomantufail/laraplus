<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class VoucherEntry extends Model implements ModelInterface
{
    
 	private $id = null;
 	private $voucherId = 0;
 	private $transactionTypeId = 0;
 	private $debitAmount = 0;
 	private $creditAmount = 0;//DummyProps

    public function __construct($id = null, $voucherId = 0, $transactionTypeId = 0, $debitAmount = 0, $creditAmount = 0/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setVoucherId($voucherId);
 	 	$this->setTransactionTypeId($transactionTypeId);
 	 	$this->setDebitAmount($debitAmount);
 	 	$this->setCreditAmount($creditAmount);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'voucherId' => $this->getVoucherId(), 
 	 	 	'transactionTypeId' => $this->getTransactionTypeId(), 
 	 	 	'debitAmount' => $this->getDebitAmount(), 
 	 	 	'creditAmount' => $this->getCreditAmount()//DummyToArray
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
     * @return $voucherId
     */
    public function getVoucherId()
    {
        return $this->voucherId;
    }

    /**
     * @param $voucherId
     */
    public function setVoucherId($voucherId)
    {
        $this->voucherId = $voucherId;
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


    /**
     * @return $debitAmount
     */
    public function getDebitAmount()
    {
        return $this->debitAmount;
    }

    /**
     * @param $debitAmount
     */
    public function setDebitAmount($debitAmount)
    {
        $this->debitAmount = $debitAmount;
    }


    /**
     * @return $creditAmount
     */
    public function getCreditAmount()
    {
        return $this->creditAmount;
    }

    /**
     * @param $creditAmount
     */
    public function setCreditAmount($creditAmount)
    {
        $this->creditAmount = $creditAmount;
    }


//DummyGetterSetters
}