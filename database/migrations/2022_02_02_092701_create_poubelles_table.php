<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoubellesTable extends Migration
{
    public function up()
    {
        Schema::create('poubelles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bloc_poubelle_id')->constrained('bloc_poubelles')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nom');
            $table->string('qrcode')->nullable();
            $table->integer('capacite_poubelle');
            $table->enum('type', ['plastique', 'composte','papier','canette']);
            $table->float('Etat');
            $table->dateTime('temps_remplissage');
            $table->timestamps();
            $table->softDeletes();
           // $table ->unique('bloc_poubelle_id','type');
        });
        Schema::enableForeignKeyConstraints();
      }
    public function down()
    {
        Schema::table("poubelles",function(Blueprint $table){
            $table->dropForeignKey("bloc_poubelle_id");
        });
        Schema::dropIfExists('poubelles');
    }
}
