<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_visits', function (Blueprint $table) {
            $table->id();
            $table->string('type_Card');
            $table->string('electron_name')->nullable();
            $table->string('shop_name');
            $table->string('phone');
            $table->string('city');
            $table->string('land');
            $table->string('zone_activity');
            $table->string('flname');
            $table->string('fname');
            $table->string('lname');
            $table->mediumText('desc');
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
        Schema::dropIfExists('request_visits');
    }
}
