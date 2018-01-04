<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus_classes', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('campuse_id')->unsigned();
                    $table->foreign('campuse_id','fk_59ca899830c87')->references('id')->on('campuses')->onDelete('cascade');
 	 	 	$table->string('class_name')->nullable();
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
        Schema::dropIfExists('campus_classes');
    }
}
