<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    protected $table = 'institutes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'head_office_addr'/*DummyFillables*/
    ];

    //DummyRelationship
}
