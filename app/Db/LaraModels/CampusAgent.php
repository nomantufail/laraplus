<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class CampusAgent extends Model
{
    protected $table = 'campus_agents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campus_id', 'agent_id'/*DummyFillables*/
    ];

    //DummyRelationship
}
