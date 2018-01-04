<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class StudentGuardian extends Model
{
    protected $table = 'student_guardians';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'guardian_id'/*DummyFillables*/
    ];

    //DummyRelationship
}
