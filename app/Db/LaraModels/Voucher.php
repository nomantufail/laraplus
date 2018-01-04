<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'vouchers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campus_id', 'description', 'due_date'/*DummyFillables*/
    ];

    
 
 	 public function campus(){
            return $this->belongsTo(Campus::class, 'campus_id');
        }
 
 	public function voucherEntrys(){
            return $this->hasMany(VoucherEntry::class, 'voucher_id');
        }//DummyRelationship
}
