<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateStockPoubellesTable extends Migration{
    public function up(){
        Schema::create('stock_poubelles', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite_disponible_plastique')->default(0);
            $table->integer('quantite_disponible_canette')->default(0);
            $table->integer('quantite_disponible_composte')->default(0);
            $table->integer('quantite_disponible_papier')->default(0);
            $table->integer('capacite_poubelle')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(){
        Schema::dropIfExists('stock_poubelles');
    }
};
