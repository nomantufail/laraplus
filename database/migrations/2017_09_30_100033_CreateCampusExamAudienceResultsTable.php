<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusExamAudienceResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus_exam_audience_results', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('campus_exam_id')->unsigned();
                    $table->foreign('campus_exam_id','fk_59cf336d45c2f')->references('id')->on('campuses')->onDelete('cascade');
 	 	 	$table->integer('student_id')->unsigned();
                    $table->foreign('student_id','fk_59cf3370ebf93')->references('id')->on('students')->onDelete('cascade');
 	 	 	$table->integer('obtained_marks')->nullable();
 	 	 	$table->string('instructor_comments')->nullable();
 	 	 	 $table->timestamps(); 
 	 	 	$table->text('address')->nullable();
 	 	 	$table->string('type')->default('co'); 
 	 	 	$table->string('addr')->nullable(); //DummyColumns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campus_exam_audience_results');
    }
}
