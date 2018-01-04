<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus_agents', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('campus_id')->unsigned();
                    $table->foreign('campus_id','fk_59ca892d70e63')->references('id')->on('campuses')->onDelete('cascade');
 	 	 	$table->integer('agent_id')->unsigned();
                    $table->foreign('agent_id','fk_59ca892f2367c')->references('id')->on('agents')->onDelete('cascade');
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
        Schema::dropIfExists('campus_agents');
    }
}
