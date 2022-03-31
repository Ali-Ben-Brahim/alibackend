<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateDetailCommandePoubellesTable extends Migration
{
    public function up()
    {
        Schema::create('detail_commande_poubelles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commande_poubelle_id')->constrained('commande_poubelles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('stock_poubelle_id')->constrained('stock_poubelles')->onDelete('cascade')->onUpdate('cascade');
            $table->float('quantite')->default(0);
            $table->float('prix_unitaires');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::enableForeignKeyConstraints();
    }
    public function down()
    {
        Schema::table("detail_commande_poubelles",function(Blueprint $table){
            $table->dropForeignKey("commande_poubelle_id");
        });
        Schema::table("detail_commande_poubelles",function(Blueprint $table){
            $table->dropForeignKey("stock_poubelle_id");
        });
        Schema::dropIfExists('detail_commande_poubelles');
    }
}



