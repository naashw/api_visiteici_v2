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
        Schema::create('biens_parking', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyInteger('categories');
            $table->string('nom');
            $table->text('description');
            $table->char('code_postal',5);
            $table->string('ville');
            $table->string('adresse');
            $table->decimal('prix',12,2);
            $table->boolean('charges_comprises');
            $table->decimal('surface');
            $table->boolean('garage');
            $table->boolean('parking');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biens_parking');
    }
};
