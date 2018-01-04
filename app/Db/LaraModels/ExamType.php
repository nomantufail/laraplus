<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    protected $table = 'exam_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type'/*DummyFillables*/
    ];

    
 
 	public function campusDatesheet(){
                        return $this->hasMany(CampusDatesheet::class, 'exam_type_id');
                    }//DummyRelationship
}
