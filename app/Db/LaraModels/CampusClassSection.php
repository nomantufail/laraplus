<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class CampusClassSection extends Model
{
    protected $table = 'campus_class_sections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campus_class_id', 'section_name', 'incharge_id'/*DummyFillables*/
    ];

    
 
 	public function feeStructures(){
            return $this->hasMany(FeeStructure::class, 'section_id');
        }//DummyRelationship
}
