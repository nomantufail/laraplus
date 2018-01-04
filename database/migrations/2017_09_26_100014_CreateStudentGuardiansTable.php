<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_guardians', function (Blueprint $table) {
            
 	 	 	$table->increments('id');
 	 	 	$table->integer('student_id')->unsigned();
                    $table->foreign('student_id','fk_59ca8753a362c')->references('id')->on('students')->onDelete('cascade');
 	 	 	$table->integer('guardian_id')->unsigned();
                    $table->foreign('guardian_id','fk_59ca8756dfb1c')->references('id')->on('guardians')->onDelete('cascade');
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
        Schema::dropIfExists('student_guardians');
    }
}
