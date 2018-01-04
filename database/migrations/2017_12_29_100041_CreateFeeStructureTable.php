<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeStructureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_structure', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('section_id')->unsigned();
                    $table->foreign('section_id','fk_5a4619cf7e587')->references('id')->on('campus_class_sections')->onDelete('cascade');
 	 	 	$table->integer('transaction_type_id')->unsigned();
                    $table->foreign('transaction_type_id','fk_5a4619cf7e7e1')->references('id')->on('campus_transaction_types')->onDelete('cascade');
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
        Schema::dropIfExists('fee_structure');
    }
}
