<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    protected $table = 'student_attendance';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'attendance_status', 'check_in', 'check_out', 'attendance_date', 'leave_reason_id', 'session_id'/*DummyFillables*/
    ];

    //DummyRelationship
}
