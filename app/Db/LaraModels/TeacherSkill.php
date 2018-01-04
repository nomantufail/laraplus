<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class TeacherSkill extends Model
{
    protected $table = 'teacher_skills';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'teacher_id', 'campus_class_id', 'subject_id'/*DummyFillables*/
    ];
    //DummyRelationship
}
