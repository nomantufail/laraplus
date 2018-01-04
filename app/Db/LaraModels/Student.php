<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'agent_id'/*DummyFillables*/
    ];

 	public function campusExamAudienceResult(){
        return $this->hasMany(CampusExamAudienceResult::class, 'student_id');
    } 

    public function foos2(){
        return $this->hasMany(Foo::class, 'student_id');
    }
 
    public function foos(){
        return $this->hasMany(Foo::class, 'student_id');
    }//DummyRelationship
}
