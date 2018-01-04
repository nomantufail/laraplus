<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus_exams', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('campus_id')->unsigned();
                    $table->foreign('campus_id','fk_59cf31c774d5e')->references('id')->on('campuses')->onDelete('cascade');
 	 	 	$table->integer('campus_exam_type_id')->unsigned();
                    $table->foreign('campus_exam_type_id','fk_59cf31cd571cf')->references('id')->on('campus_exam_types')->onDelete('cascade');
 	 	 	$table->string('exam_title')->nullable();
 	 	 	$table->integer('subject_id')->unsigned();
                    $table->foreign('subject_id','fk_59cf31cf8b89a')->references('id')->on('subjects')->onDelete('cascade');
 	 	 	$table->date('exam_date')->nullable();
 	 	 	$table->time('start_time')->nullable();
 	 	 	$table->time('end_time')->nullable();
 	 	 	$table->integer('total_marks')->nullable();
 	 	 	$table->integer('passing_marks')->nullable();
 	 	 	$table->integer('create_by_id')->unsigned();
                    $table->foreign('create_by_id','fk_59cf31d231408')->references('id')->on('agents')->onDelete('cascade');
 	 	 	$table->integer('duration')->nullable();
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
        Schema::dropIfExists('campus_exams');
    }
}
