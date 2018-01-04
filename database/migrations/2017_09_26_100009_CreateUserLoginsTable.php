<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_logins', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('user_id')->unsigned();
                    $table->foreign('user_id','fk_59ca864b11670')->references('id')->on('users')->onDelete('cascade');
 	 	 	$table->string('session_token')->nullable();
 	 	 	$table->boolean('active')->nullable();
 	 	 	$table->string('deviceid')->nullable();
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
        Schema::dropIfExists('user_logins');
    }
}
