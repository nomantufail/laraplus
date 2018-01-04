<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('campus_id')->unsigned();
                    $table->foreign('campus_id','fk_59d1b6880b542')->references('id')->on('campuses')->onDelete('cascade');
 	 	 	$table->text('description')->nullable();
 	 	 	$table->date('due_date')->nullable();
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
        Schema::dropIfExists('vouchers');
    }
}
