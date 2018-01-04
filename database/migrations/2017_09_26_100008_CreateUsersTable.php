<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->string('username')->nullable();
 	 	 	$table->string('password')->nullable();
 	 	 	$table->integer('agent_id')->unsigned();
                    $table->foreign('agent_id','fk_59ca8601a20a3')->references('id')->on('agents')->onDelete('cascade');
 	 	 	 $table->timestamps(); 
 	 	 	$table->string('foo')->nullable(); //DummyColumns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
