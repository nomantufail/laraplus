<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionSubjectTimingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_subject_timings', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('campus_class_section_id')->unsigned();
                    $table->foreign('campus_class_section_id','fk_59ca9110d7e36')->references('id')->on('campus_class_sections')->onDelete('cascade');
 	 	 	$table->integer('subject_id')->unsigned();
                    $table->foreign('subject_id','fk_59ca9112728dc')->references('id')->on('subjects')->onDelete('cascade');
 	 	 	$table->time('start_time')->nullable();
 	 	 	$table->time('end_time')->nullable();
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
        Schema::dropIfExists('section_subject_timings');
    }
}
