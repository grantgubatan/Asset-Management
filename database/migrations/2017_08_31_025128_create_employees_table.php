<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hardware_id')->nullable();
            $table->string('emp_id')->nullable();
            $table->string('name')->nullable();
            $table->string('seat')->nullable();
<<<<<<< HEAD
=======
            $table->string('deployed_by')->nullable();
            $table->date('deployed_date')->nullable();
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
