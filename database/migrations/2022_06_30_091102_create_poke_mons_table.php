<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokeMonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poke_mons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type_one');
            $table->string('type_two')->nullable();
            $table->string('total');
            $table->string('hp');
            $table->string('attack');
            $table->string('defense');
            $table->string('sp_atk');
            $table->string('sp_def');
            $table->string('speed');
            $table->string('generation');
            $table->string('legendary');
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
        Schema::dropIfExists('poke_mons');
    }
}
