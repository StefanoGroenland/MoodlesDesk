<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGebruikersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gebruikers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('gebruikersnaam')->unique();
            $table->string('wachtwoord');
            $table->string('klantnummer')->unique();
            $table->string('email');
            $table->string('bedrijf');
            $table->string('voornaam');
            $table->string('achternaam');
            $table->text('profielfoto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gebruikers');
    }
}
