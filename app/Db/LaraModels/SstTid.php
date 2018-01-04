<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class SstTid extends Model
{
    protected $table = 'sst_tids';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'section_subject_timing_id', 'teacher_id'/*DummyFillables*/
    ];

    //DummyRelationship
}
