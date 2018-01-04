<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $table = 'bank_accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campus_id', 'bank', 'account_number'/*DummyFillables*/
    ];

    
 
 	 public function campus(){
            return $this->belongsTo(Campus::class, 'campus_id');
        }//DummyRelationship
}
