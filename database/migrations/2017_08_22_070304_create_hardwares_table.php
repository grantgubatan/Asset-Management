<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHardwaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hardwares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial')->nullable();
            $table->string('model_name')->nullable();
            $table->string('hardware_type')->nullable();
            $table->string('brand')->nullable();
            $table->string('processor')->nullable();
            $table->string('ram')->nullable();
            $table->string('storage')->nullable();
            $table->string('storage_type')->nullable();
            $table->date('purchased_date')->nullable();
            $table->date('warranty_date')->nullable();
            $table->string('status')->default('Delivered');
<<<<<<< HEAD
            $table->string('deployed_by')->nullable();
            $table->date('deployed_date')->nullable();
            $table->date('disposed_date')->nullable();
=======
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
        Schema::dropIfExists('hardwares');
    }
}
