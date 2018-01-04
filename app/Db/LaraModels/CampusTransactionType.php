<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class CampusTransactionType extends Model
{
    protected $table = 'campus_transaction_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campus_id', 'type'/*DummyFillables*/
    ];

    public function feeStructure(){
        return $this->hasMany(FeeStructure::class, 'transaction_type_id');
    }
 
 	 public function campus(){
            return $this->belongsTo(Campus::class, 'campus_id');
        }//DummyRelationship
}
