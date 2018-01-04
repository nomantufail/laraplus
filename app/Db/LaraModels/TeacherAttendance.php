<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class TeacherAttendance extends Model
{
    protected $table = 'teacher_attendance';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'teacher_id', 'attendance_status', 'check_in', 'check_out', 'attendance_date', 'leave_reason_id', 'session_id'/*DummyFillables*/
    ];
    //DummyRelationship
}
