<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSstSidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sst_sid', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('section_subject_timing_id')->unsigned();
                    $table->foreign('section_subject_timing_id','fk_59ca923a245c2')->references('id')->on('section_subject_timings')->onDelete('cascade');
 	 	 	$table->integer('student_id')->unsigned();
                    $table->foreign('student_id','fk_59ca923e7d837')->references('id')->on('students')->onDelete('cascade');
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
        Schema::dropIfExists('sst_sid');
    }
}
