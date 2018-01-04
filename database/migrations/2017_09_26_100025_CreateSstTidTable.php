<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSstTidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sst_tids', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('section_subject_timing_id')->unsigned();
                    $table->foreign('section_subject_timing_id','fk_59caa437620cf')->references('id')->on('section_subject_timings')->onDelete('cascade');
 	 	 	$table->integer('teacher_id')->unsigned();
                    $table->foreign('teacher_id','fk_59caa439c718c')->references('id')->on('teachers')->onDelete('cascade');
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
        Schema::dropIfExists('sst_tids');
    }
}
