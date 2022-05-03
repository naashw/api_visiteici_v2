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
        Schema::create('user_public', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
            $table->string('name_public')->unique()->nullable();
            $table->string('email_public')->unique()->nullable();
            $table->char('telephone_public',20)->unique()->nullable();
            $table->string('ville_public')->nullable();
            $table->string('nom_societe_public')->nullable();
            $table->string('url_website_societe_public')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_public');
    }
};
