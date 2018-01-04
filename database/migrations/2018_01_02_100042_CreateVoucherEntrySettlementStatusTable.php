<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherEntrySettlementStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_entry_settlement_status', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('voucher_entry_id')->unsigned();
                    $table->foreign('voucher_entry_id','fk_5a4b330225313')->references('id')->on('voucher_entries')->onDelete('cascade');
 	 	 	$table->tinyInteger('settled')->default(0);
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
        Schema::dropIfExists('voucher_entry_settlement_status');
    }
}
