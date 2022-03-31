<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFournisseursTable extends Migration
{
    public function up()
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string('CIN',8)->unique();
            $table->string('nom',20);
            $table->string('prenom',20);
            $table->string('photo')->nullable();
            $table->string('adresse')->unique();
            $table->string('numero_telephone')->unique();
            $table->string('email')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down()
    {
        Schema::dropIfExists('fournisseurs');
    }
};
