<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $table = 'guardians';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'agent_id'/*DummyFillables*/
    ];

    //DummyRelationship
}
