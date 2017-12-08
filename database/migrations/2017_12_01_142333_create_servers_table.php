<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('ip');
          $table->string('status')->nullable();
          $table->string('latency')->nullable();
          $table->string('peak')->nullable();
          $table->timestamp('peak_time')->nullable();
          $table->timestamp('last_update')->nullable();
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
        Schema::dropIfExists('servers');
    }
}
