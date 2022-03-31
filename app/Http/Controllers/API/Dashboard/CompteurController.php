<?php

namespace App\Http\Controllers\API\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Reparation_poubelle;
use App\Models\Reparation_camion;
use App\Models\Bloc_poubelle;
use App\Models\Camion;
use App\Models\Client_dechet;
use App\Models\Commande_dechet;
use App\Models\Commande_poubelle;
use App\Models\Etablissement;
use App\Models\Fournisseur;
use App\Models\Ouvrier;
use App\Models\Poubelle;
use App\Models\Stock_poubelle;
use App\Models\Zone_travail;
class CompteurController extends Controller{
    public function dashbordValeur(){
        $nbr_zone_travail= Zone_travail::all()->count();
        $nbr_etablissement= Etablissement::all()->count();
        $nbr_bloc_poubelle= Bloc_poubelle::all()->count();
        $nbr_poubelle_vendus= Poubelle::all()->count();

        $nbr_poubelle_stock= Stock_poubelle::all()->count();

        $nbr_client_dechet= Client_dechet::all()->count();
        $nbr_camion= Camion::all()->count();
        $nbr_ouvrier= Ouvrier::all()->count();

        $nbr_panne_poubelle= Reparation_poubelle::all()->count();
        $nbr_panne_camion= Reparation_camion::all()->count();

        $nbr_fournisseur= Fournisseur::all()->count();
        $nbr_commande_dechet= Commande_dechet::all()->count();
        $nbr_commande_poubelle= Commande_poubelle::all()->count();

        $myArray = [
            'nbr_zone_travail'=>$nbr_zone_travail,
            'nbr_etablissement'=>$nbr_etablissement,
            'nbr_bloc_poubelle'=>$nbr_bloc_poubelle,
            'nbr_poubelle_vendus'=>$nbr_poubelle_vendus,

            'nbr_poubelle_stock'=>$nbr_poubelle_stock,
            'nbr_client_dechet'=>$nbr_client_dechet,
            'nbr_camion'=>$nbr_camion,
            'nbr_ouvrier'=>$nbr_ouvrier,
            'nbr_panne_camion'=>$nbr_panne_camion,
            'nbr_panne_poubelle'=>$nbr_panne_poubelle,

            'nbr_fournisseur'=>$nbr_fournisseur,
            'nbr_commande_dechet'=>$nbr_commande_dechet,
            'nbr_commande_poubelle'=>$nbr_commande_poubelle,
        ];
        return response()->json($myArray);
    }
}
