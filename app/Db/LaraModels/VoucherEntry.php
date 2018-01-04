<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class VoucherEntry extends Model
{
    protected $table = 'voucher_entries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'voucher_id', 'transaction_type_id', 'debit_amount', 'credit_amount'/*DummyFillables*/
    ];

    
 
 	 public function voucher(){
            return $this->belongsTo(Voucher::class, 'voucher_id');
        }
 
 	 public function transactionType(){
            return $this->belongsTo(TransactionType::class, 'transaction_type_id');
        }
 
 	public function voucherEntrySettlementStatuss(){
            return $this->hasMany(VoucherEntrySettlementStatus::class, 'voucher_entry_id');
        }//DummyRelationship
}
