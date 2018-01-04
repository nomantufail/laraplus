<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class CampusClass extends Model
{
    protected $table = 'campus_classes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campuse_id', 'class_name'/*DummyFillables*/
    ];

    //DummyRelationship
}
