<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class OtherEmployee extends Model
{
    protected $table = 'other_employees';

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
