<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    protected $table = 'class_subjects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campus_class_id', 'subject_id'/*DummyFillables*/
    ];

    //DummyRelationship
}
