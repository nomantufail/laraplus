<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_attendance', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('student_id')->unsigned();
                    $table->foreign('student_id','fk_59caa59b03d94')->references('id')->on('students')->onDelete('cascade');
 	 	 	$table->integer('attendance_status')->nullable();
 	 	 	$table->time('check_in')->nullable();
 	 	 	$table->time('check_out')->nullable();
 	 	 	$table->date('attendance_date')->nullable();
 	 	 	$table->integer('leave_reason_id')->unsigned();
                    $table->foreign('leave_reason_id','fk_59caa5a02df56')->references('id')->on('leave_reasons')->onDelete('cascade');
 	 	 	$table->integer('session_id')->unsigned();
                    $table->foreign('session_id','fk_59caa5a29c6b6')->references('id')->on('sessions')->onDelete('cascade');
 	 	 	 $table->timestamps(); //DummyColumns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_attendance');
    }
}
