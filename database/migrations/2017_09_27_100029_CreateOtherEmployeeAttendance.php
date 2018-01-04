<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherEmployeeAttendance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_emp_attendance', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('other_employee_id')->unsigned();
                    $table->foreign('other_employee_id','fk_59cb51e11880d')->references('id')->on('other_employees')->onDelete('cascade');
 	 	 	$table->integer('attendance_status')->nullable();
 	 	 	$table->time('check_in')->nullable();
 	 	 	$table->time('check_out')->nullable();
 	 	 	$table->date('attendance_date')->nullable();
 	 	 	$table->integer('leave_reason_id')->unsigned();
                    $table->foreign('leave_reason_id','fk_59cb51e4cac50')->references('id')->on('leave_reasons')->onDelete('cascade');
 	 	 	$table->integer('session_id')->unsigned();
                    $table->foreign('session_id','fk_59cb51e791025')->references('id')->on('sessions')->onDelete('cascade');
 	 	 	 $table->timestamps(); 
 	 	 	$table->string('foo')->nullable(); //DummyColumns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('other_emp_attendance');
    }
}
