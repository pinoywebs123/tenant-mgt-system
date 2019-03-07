<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBedspacerTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bedspacer_tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id');
            $table->integer('tenant_id');
            $table->double('payment');
            $table->integer('status_id');
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
        Schema::dropIfExists('bedspacer_tenants');
    }
}
