<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandePoubellesTable extends Migration
{
    public function up()
    {
        Schema::create('commande_poubelles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('responsable_etablissement_id')->constrained('responsable_etablissements')->onDelete('cascade')->onUpdate('cascade');
            $table->float('quantite')->default(0);
            $table->float('montant_total')->nullable();
            $table->datetime('date_commande');
            $table->datetime('date_livraison');
            $table->timestamps();
            $table->softDeletes();
       });
       Schema::enableForeignKeyConstraints();
    }
    public function down()
    {
        Schema::table("commande_poubelles",function(Blueprint $table){
            $table->dropForeignKey("responsable_etablissement_id");
        });
        Schema::dropIfExists('commande_poubelles');
    }
};
