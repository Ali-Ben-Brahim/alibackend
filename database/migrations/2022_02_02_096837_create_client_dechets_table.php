<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientDechetsTable extends Migration
{
    public function up()
    {
        Schema::create('client_dechets', function (Blueprint $table) {
            $table->id();
            $table->string('CIN',8)->unique();
            $table->string('nom',20);
            $table->string('prenom',20);
            $table->string('photo');
            $table->string('adresse')->unique();
            $table->string('numero_telephone')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mot_de_passe');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down()
    {
        Schema::dropIfExists('client_dechets');
    }
}
