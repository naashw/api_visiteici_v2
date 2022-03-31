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
        Schema::create('biens_maison', function (Blueprint $table) {
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
            $table->boolean('meublé')->nullable();
            $table->decimal('surface');
            $table->tinyInteger('nb_pieces');
            $table->tinyInteger('nb_chambres');
            $table->boolean('fibre_optique');
            $table->boolean('balcon');
            $table->boolean('terrasse');
            $table->decimal('terasse_surface')->nullable();
            $table->boolean('cave');
            $table->boolean('jardin');
            $table->decimal('jardin_surface')->nullable();
            $table->boolean('parking');
            $table->boolean('garage');
            $table->tinyInteger('classe_energie');
            $table->tinyInteger('GES');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biens_maison');
    }
};
