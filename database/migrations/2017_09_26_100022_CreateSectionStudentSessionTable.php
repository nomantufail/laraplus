<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionStudentSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_student_sessions', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('campus_class_section_id')->unsigned();
                    $table->foreign('campus_class_section_id','fk_59ca8c22c626b')->references('id')->on('campus_class_sections')->onDelete('cascade');
 	 	 	$table->integer('student_id')->unsigned();
                    $table->foreign('student_id','fk_59ca8c251efc9')->references('id')->on('students')->onDelete('cascade');
 	 	 	$table->integer('session_id')->unsigned();
                    $table->foreign('session_id','fk_59ca8c266462c')->references('id')->on('sessions')->onDelete('cascade');
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
        Schema::dropIfExists('section_student_sessions');
    }
}
