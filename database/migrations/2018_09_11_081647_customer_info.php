<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomerInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customerinfo', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('customerName');
            $table->string('address');
            $table->string('organization');
            $table->string('email');
            $table->string('mobileNumber');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customerinfo');
    }
}
