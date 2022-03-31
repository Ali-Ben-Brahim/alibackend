<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateZoneDepotsTable extends Migration{
    public function up(){
        Schema::create('zone_depots', function (Blueprint $table) {
            $table->id();
            $table->string('adresse');
            $table->float('longitude',30,27);
            $table->float('latitude',30,27);
            $table->float('quantite_depot_maximale');
            $table->float('quantite_depot_actuelle_plastique');
            $table->float('quantite_depot_actuelle_papier');
            $table->float('quantite_depot_actuelle_composte');
            $table->float('quantite_depot_actuelle_canette');
            $table->unique('longitude','latitude');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(){
        Schema::dropIfExists('zone_depots');
    }
}
