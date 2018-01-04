<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusClassSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus_class_sections', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('campus_class_id')->unsigned();
                    $table->foreign('campus_class_id','fk_59ca8a04742e9')->references('id')->on('campus_classes')->onDelete('cascade');
 	 	 	$table->string('section_name')->nullable();
 	 	 	$table->integer('incharge_id')->unsigned();
                    $table->foreign('incharge_id','fk_59ca8a0895748')->references('id')->on('teachers')->onDelete('cascade');
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
        Schema::dropIfExists('campus_class_sections');
    }
}
