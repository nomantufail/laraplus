<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class SectionStudentSession extends Model
{
    protected $table = 'section_student_sessions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campus_class_section_id', 'student_id', 'session_id'/*DummyFillables*/
    ];

    //DummyRelationship
}
