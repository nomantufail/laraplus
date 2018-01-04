<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'start', 'end'/*DummyFillables*/
    ];

    //DummyRelationship
}
