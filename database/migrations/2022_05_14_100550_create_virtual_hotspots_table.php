<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_hotspots', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('virtual_room_id')->constrained();
            $table->string('data_room');
            $table->string('data_target_room');
            $table->string('data_yaw');
            $table->string('data_pitch');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('virtual_hotspots');
    }
};
