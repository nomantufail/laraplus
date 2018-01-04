<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_skills', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('teacher_id')->unsigned();
                    $table->foreign('teacher_id','fk_59ca8b439cd69')->references('id')->on('teachers')->onDelete('cascade');
 	 	 	$table->integer('campus_class_id')->unsigned();
                    $table->foreign('campus_class_id','fk_59ca8b4a4c725')->references('id')->on('campus_classes')->onDelete('cascade');
 	 	 	$table->integer('subject_id')->unsigned();
                    $table->foreign('subject_id','fk_59ca8b5c8a8d9')->references('id')->on('subjects')->onDelete('cascade');
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
        Schema::dropIfExists('teacher_skills');
    }
}
