<?php
namespace LaraModels;

use Illuminate\Database\Eloquent\Model;

class OtherEmpAttendance extends Model
{
    protected $table = 'other_emp_attendance';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'other_employee_id', 'attendance_status', 'check_in', 'check_out', 'attendance_date', 'leave_reason_id', 'session_id', 'foo'/*DummyFillables*/
    ];

    //DummyRelationship
}
