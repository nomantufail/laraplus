<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_attendance', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('teacher_id')->unsigned();
                    $table->foreign('teacher_id','fk_59caa61b20ca7')->references('id')->on('teachers')->onDelete('cascade');
 	 	 	$table->integer('attendance_status')->nullable();
 	 	 	$table->time('check_in')->nullable();
 	 	 	$table->time('check_out')->nullable();
 	 	 	$table->date('attendance_date')->nullable();
 	 	 	$table->integer('leave_reason_id')->unsigned();
                    $table->foreign('leave_reason_id','fk_59caa61e8086e')->references('id')->on('leave_reasons')->onDelete('cascade');
 	 	 	$table->integer('session_id')->unsigned();
                    $table->foreign('session_id','fk_59caa620ae32a')->references('id')->on('sessions')->onDelete('cascade');
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
        Schema::dropIfExists('teacher_attendance');
    }
}
