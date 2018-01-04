<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campuses', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->string('name')->nullable();
 	 	 	$table->integer('institute_id')->unsigned();
                    $table->foreign('institute_id','fk_59ca88de89a0d')->references('id')->on('institutes')->onDelete('cascade');
 	 	 	$table->text('address')->nullable();
 	 	 	$table->string('type')->default('co'); //DummyColumns
 	 	 	 $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campuses');
    }
}
