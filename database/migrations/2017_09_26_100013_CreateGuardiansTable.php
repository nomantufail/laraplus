<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->string('name')->nullable();
 	 	 	$table->integer('agent_id')->unsigned();
                    $table->foreign('agent_id','fk_59ca8704c1b8a')->references('id')->on('agents')->onDelete('cascade');
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
        Schema::dropIfExists('guardians');
    }
}
