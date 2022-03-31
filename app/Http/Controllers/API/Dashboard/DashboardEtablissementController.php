<?php

namespace App\Http\Controllers\API\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Models\Poubelle;
use App\Models\Responsable_etablissement;
use App\Http\Resources\GestionPoubelleEtablissements\Etablissement as EtablissementResource;
use App\Models\Bloc_poubelle;
use Illuminate\Support\Facades\DB;

class DashboardEtablissementController extends Controller{
     public function donnee_etablissement($id){
        $etablissement=  Etablissement::findOrFail($id);
        $bloc_poubelle=$etablissement->bloc_poubelles;
        $poubelle=[];
        foreach($bloc_poubelle as $bloc){
            $Array = [
                'bloc'=>$bloc,
                'poubelles'=>Poubelle::where('bloc_poubelle_id',$bloc->id)->get(),
            ];
            array_push($poubelle,$Array);
        }


        $responsable_etablissement_id=$etablissement->responsable_etablissement_id;
        $responsable_etablissement=  Responsable_etablissement::where('id',$responsable_etablissement_id)->get();

        $myArray = [
            'etablissement'=>$etablissement,
            'responsable_etablissement'=>$responsable_etablissement,
            'bloc_poubelle'=>$poubelle,
        ];
        return response()->json($myArray);
    }

    public function dashboard_etablissement($id){
        $etablissement=  Etablissement::findOrFail($id);
        $nbr_bloc_poubelle_etablissement= Etablissement::withcount('bloc_poubelles')->where('id','=',$id)->get();
        $bloc_etablissement=Bloc_poubelle::selectRaw('bloc_etablissement, count(*)')->where("etablissement_id",$id)
        ->groupBy('bloc_etablissement')
        ->get();

        $etage_etablissement_par_bloc_etablissment=Bloc_poubelle::selectRaw('bloc_etablissement ,etage_etablissement, count(*)')->where("etablissement_id",$id)
        ->groupBy('bloc_etablissement','etage_etablissement')
        ->get();


        $myArray = [
            'etablissement'=>$nbr_bloc_poubelle_etablissement,
            'bloc_etablissement'=>$bloc_etablissement,
            'etage_etablissement_par_bloc_etablissment'=>$etage_etablissement_par_bloc_etablissment,
        ];
        return response()->json($myArray);
    }
}
