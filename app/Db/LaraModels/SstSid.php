<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class SstSid extends Model
{
    protected $table = 'sst_sid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'section_subject_timing_id', 'student_id'/*DummyFillables*/
    ];

    //DummyRelationship
}
