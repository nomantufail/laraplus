<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class LeaveReason extends Model
{
    protected $table = 'leave_reasons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reason'/*DummyFillables*/
    ];

    //DummyRelationship
}
