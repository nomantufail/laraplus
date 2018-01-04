<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class SectionSubjectTiming extends Model
{
    protected $table = 'section_subject_timings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campus_class_section_id', 'subject_id', 'start_time', 'end_time'/*DummyFillables*/
    ];

    //DummyRelationship
}
