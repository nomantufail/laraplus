<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusExamTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus_exam_types', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('campus_id')->unsigned();
                    $table->foreign('campus_id','fk_59cf2c11586d1')->references('id')->on('campuses')->onDelete('cascade');
 	 	 	$table->string('type')->nullable();
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
        Schema::dropIfExists('campus_exam_types');
    }
}
