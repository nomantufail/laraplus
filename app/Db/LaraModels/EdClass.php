<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class EdClass extends Model
{
    protected $table = 'ed_classes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address'/*DummyFillables*/
    ];

    //DummyRelationship
}
