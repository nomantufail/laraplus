<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    protected $table = 'fee_structure';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'section_id', 'transaction_type_id'/*DummyFillables*/
    ];

    
 
 	 public function section(){
            return $this->belongsTo(CampusClassSection::class, 'section_id');
        }
 
 	 public function transactionType(){
            return $this->belongsTo(CampusTransactionType::class, 'transaction_type_id');
        }//DummyRelationship
}
