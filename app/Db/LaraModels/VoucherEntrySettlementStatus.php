<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class VoucherEntrySettlementStatus extends Model
{
    protected $table = 'voucher_entry_settlement_status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'voucher_entry_id', 'settled'/*DummyFillables*/
    ];

    
 
 	 public function voucherEntry(){
            return $this->belongsTo(VoucherEntry::class, 'voucher_entry_id');
        }//DummyRelationship
}
