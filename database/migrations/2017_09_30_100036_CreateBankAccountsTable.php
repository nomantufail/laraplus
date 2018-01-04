<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('campus_id')->unsigned();
                    $table->foreign('campus_id','fk_59cf3a0980ea2')->references('id')->on('campuses')->onDelete('cascade');
 	 	 	$table->string('bank')->nullable();
 	 	 	$table->string('account_number')->nullable();
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
        Schema::dropIfExists('bank_accounts');
    }
}
