<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_entries', function (Blueprint $table) {

 	 	 	$table->increments('id');
 	 	 	$table->integer('voucher_id')->unsigned();
                    $table->foreign('voucher_id','fk_59d1b7e1c5763')->references('id')->on('vouchers')->onDelete('cascade');
 	 	 	$table->integer('transaction_type_id')->unsigned();
                    $table->foreign('transaction_type_id','fk_59d1b7e1c6096')->references('id')->on('campus_transaction_types')->onDelete('cascade');
 	 	 	$table->integer('debit_amount')->nullable();
 	 	 	$table->integer('credit_amount')->nullable();
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
        Schema::dropIfExists('voucher_entries');
    }
}
