<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class CampusExamType extends Model
{
    protected $table = 'campus_exam_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campus_id', 'type'/*DummyFillables*/
    ];

    
 
    public function campus(){
        return $this->belongsTo(User::class, 'campus_id');
    }
 
 	public function campusExam(){
                        return $this->hasMany(CampusExam::class, 'campus_exam_type_id');
                    }//DummyRelationship
}
