<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'/*DummyFillables*/
    ];

    
 
 	public function campusExam(){
                        return $this->hasMany(CampusExam::class, 'subject_id');
                    }//DummyRelationship
}
