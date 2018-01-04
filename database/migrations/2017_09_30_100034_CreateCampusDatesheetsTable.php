<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusDatesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus_datesheets', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->string('title')->nullable();
 	 	 	$table->integer('created_by_id')->unsigned();
                    $table->foreign('created_by_id','fk_59cf3638b5c27')->references('id')->on('agents')->onDelete('cascade');
 	 	 	$table->integer('exam_type_id')->unsigned();
                    $table->foreign('exam_type_id','fk_59cf3638de909')->references('id')->on('exam_types')->onDelete('cascade');
 	 	 	$table->date('starting_from')->nullable();
 	 	 	$table->string('unique_identity')->nullable();
 	 	 	$table->string('result_status')->nullable();
 	 	 	$table->text('notes')->nullable();
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
        Schema::dropIfExists('campus_datesheets');
    }
}
