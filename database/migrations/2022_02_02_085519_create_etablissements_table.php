<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtablissementsTable extends Migration
{
    public function up()
    {
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zone_travail_id')->constrained('zone_travails')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('responsable_etablissement_id')->constrained('responsable_etablissements')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nom_etablissement',30)->unique();
            $table->enum('type_etablissement', ['primaire', 'college','secondaire','universite','societe']);
            $table->integer('nbr_personnes');
            $table->string('adresse')->unique();
            $table->double('longitude',30,27);
            $table->double('latitude',30,27);
            $table->float('quantite_dechets_plastique')->default(0);
            $table->float('quantite_dechets_composte')->default(0);
            $table->float('quantite_dechets_papier')->default(0);
            $table->float('quantite_dechets_canette')->default(0);
            $table->unique('nom_etablissement','responsable_etablissement_id');
            $table->unique('longitude','latitude');
            $table->timestamps();
            $table->softDeletes();

        });
        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::table("etablissements",function(Blueprint $table){
            $table->dropForeignKey("responsable_etablissement_id");
        });

        Schema::table("etablissements",function(Blueprint $table){
            $table->dropForeignKey("zone_travail_id");
        });

        Schema::dropIfExists('etablissements');
    }
}
