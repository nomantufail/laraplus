<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'/*DummyFillables*/
    ];

    //DummyRelationship
}
