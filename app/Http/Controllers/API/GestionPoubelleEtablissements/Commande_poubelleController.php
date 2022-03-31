<?php
namespace App\Http\Controllers\API\GestionPoubelleEtablissements;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\GestionPoubelleEtablissements\Commande_poubelle as Commande_poubelleResource;
use App\Models\Commande_poubelle;
use App\Http\Requests\GestionPoubelleEtablissements\Commande_poubelleRequest;
class Commande_poubelleController extends BaseController{
    public function index(){
        $commande_poubelle = Commande_poubelle::all();
        return $this->handleResponse(Commande_poubelleResource::collection($commande_poubelle), 'Affichage des commandes poubelles!');
    }
    public function store(Commande_poubelleRequest $request){
        $input = $request->all();
        $commande_poubelle = Commande_poubelle::create($input);
        return $this->handleResponse(new Commande_poubelleResource($commande_poubelle), 'commande poubelle crée!');
    }
    public function show($id){
        $commande_poubelle = Commande_poubelle::find($id);
        if (is_null($commande_poubelle)) {
            return $this->handleError('commande poubelle n\'existe pas!');
        }else{
            return $this->handleResponse(new Commande_poubelleResource($commande_poubelle), 'commande poubelle existante.');
        }
    }
    public function update(Commande_poubelleRequest $request, Commande_poubelle $commande_poubelle){
        $input = $request->all();
        $commande_poubelle->update($input);
        return $this->handleResponse(new Commande_poubelleResource($commande_poubelle), 'commande poubelle modifié!');
    }
    public function destroy($id){
        $commande_poubelle =Commande_poubelle::find($id);
        if (is_null($commande_poubelle)) {
            return $this->handleError('commande poubelle n\'existe pas!');
        }
        else{
            $commande_poubelle->delete();
            return $this->handleResponse(new Commande_poubelleResource($commande_poubelle), 'commande poubelle supprimé!');
        }
    }
}
