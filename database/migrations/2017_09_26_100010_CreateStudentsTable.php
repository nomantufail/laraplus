<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->string('first_name')->nullable();
 	 	 	$table->string('last_name')->nullable();
 	 	 	$table->integer('agent_id')->unsigned();
                    $table->foreign('agent_id','fk_59ca86832c150')->references('id')->on('agents')->onDelete('cascade');
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
        Schema::dropIfExists('students');
    }
}
