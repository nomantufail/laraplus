<?php
namespace Models;


use App\Exceptions\ValidationErrorException;

class VoucherEntrySettlementStatus extends Model implements ModelInterface
{
    
 	private $id = null;
 	private $voucherEntryId = 0;
 	private $settled = 0;//DummyProps

    public function __construct($id = null, $voucherEntryId = 0, $settled = 0/*DummyConstructArgs*/){
        
 	 	$this->setId($id);
 	 	$this->setVoucherEntryId($voucherEntryId);
 	 	$this->setSettled($settled);//DummyConstructSetters
    }

    /**
     * @return array
     * @Description: always use camelcase keys for this array. and should be same as object properties.
     */
    public function toArray(){
        return [
            
 	 	 	'id' => $this->getId(), 
 	 	 	'voucherEntryId' => $this->getVoucherEntryId(), 
 	 	 	'settled' => $this->getSettled()//DummyToArray
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
     * @return $voucherEntryId
     */
    public function getVoucherEntryId()
    {
        return $this->voucherEntryId;
    }

    /**
     * @param $voucherEntryId
     */
    public function setVoucherEntryId($voucherEntryId)
    {
        $this->voucherEntryId = $voucherEntryId;
    }


    /**
     * @return $settled
     */
    public function getSettled()
    {
        return $this->settled;
    }

    /**
     * @param $settled
     */
    public function setSettled($settled)
    {
        $this->settled = $settled;
    }


//DummyGetterSetters
}