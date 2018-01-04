<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'agent_id'/*DummyFillables*/
    ];
    //DummyRelationship
}
