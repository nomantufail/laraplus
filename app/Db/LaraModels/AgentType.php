<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class AgentType extends Model
{
    protected $table = 'agent_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'agent_type'/*DummyFillables*/
    ];

    //DummyRelationship
}
