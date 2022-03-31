<?php
namespace App\Http\Controllers\API\GestionPoubelleEtablissements;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\GestionPoubelleEtablissements\Detail_commande_poubelle as Detail_commande_poubelleResource;
use App\Models\Detail_commande_poubelle;
use App\Http\Requests\GestionPoubelleEtablissements\Detail_commande_poubelleRequest;
class Detail_commande_poubelleController extends BaseController{
    public function index(){
        $detail_commande_poubelle = Detail_commande_poubelle::all();
        return $this->handleResponse(Detail_commande_poubelleResource::collection($detail_commande_poubelle), 'Affichage des details commandes poubelles!');
    }
    public function store(Detail_commande_poubelleRequest $request){
        $input = $request->all();
        $detail_commande_poubelle = Detail_commande_poubelle::create($input);
        return $this->handleResponse(new Detail_commande_poubelleResource($detail_commande_poubelle), 'details commande poubelle crée!');
    }
    public function show($id){
        $detail_commande_poubelle = Detail_commande_poubelle::find($id);
        if (is_null($detail_commande_poubelle)) {
            return $this->handleError('commande poubelle n\'existe pas!');
        }else{
            return $this->handleResponse(new Detail_commande_poubelleResource($detail_commande_poubelle), 'details commande poubelle existante.');
        }
    }
    public function update(Detail_commande_poubelleRequest $request, Detail_commande_poubelle $detail_commande_poubelle){
        $input = $request->all();
        $detail_commande_poubelle->update($input);
        return $this->handleResponse(new Detail_commande_poubelleResource($detail_commande_poubelle), 'details commande poubelle modifié!');
    }
    public function destroy($id){
        $detail_commande_poubelle =Detail_commande_poubelle::find($id);
        if (is_null($detail_commande_poubelle)) {
            return $this->handleError('commande poubelle n\'existe pas!');
        }
        else{
            $detail_commande_poubelle->delete();
            return $this->handleResponse(new Detail_commande_poubelleResource($detail_commande_poubelle), 'details commande poubelle supprimé!');
        }
    }
}
