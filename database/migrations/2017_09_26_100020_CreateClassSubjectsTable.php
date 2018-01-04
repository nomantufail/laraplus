<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_subjects', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('campus_class_id')->unsigned();
                    $table->foreign('campus_class_id','fk_59ca8a6cdb3f6')->references('id')->on('campus_classes')->onDelete('cascade');
 	 	 	$table->integer('subject_id')->unsigned();
                    $table->foreign('subject_id','fk_59ca8a6f8fa13')->references('id')->on('subjects')->onDelete('cascade');
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
        Schema::dropIfExists('class_subjects');
    }
}
