<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDateSheetExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datesheet_exams', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('campus_datesheet_id')->unsigned();
                    $table->foreign('campus_datesheet_id','fk_59cf376aad499')->references('id')->on('campus_datesheets')->onDelete('cascade');
 	 	 	$table->integer('campus_exam_id')->unsigned();
                    $table->foreign('campus_exam_id','fk_59cf376add3cf')->references('id')->on('campus_exams')->onDelete('cascade');
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
        Schema::dropIfExists('datesheet_exams');
    }
}
