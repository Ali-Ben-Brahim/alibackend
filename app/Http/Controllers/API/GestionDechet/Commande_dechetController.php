<?php
namespace App\Http\Controllers\API\GestionDechet;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\GestionDechet\Dechet as CommandeResource;
use App\Models\Commande_dechet;
use App\Http\Requests\GestionDechet\Commande_dechetRequest;

class Commande_dechetController extends BaseController{
    public function index(){
        $commande = Commande_dechet::all();
        return $this->handleResponse(CommandeResource::collection($commande), 'tous les commandes de dechets!');
    }
    public function store(Commande_dechetRequest $request){
        $input = $request->all();
        $commande = Commande_dechet::create($input);
        return $this->handleResponse(new CommandeResource($commande), 'commande crée!');
    }
    public function show($id){
        $commande = Commande_dechet::find($id);
        if (is_null($commande)) {
            return $this->handleError('commande dechet n\'existe pas!');
        }else{
            return $this->handleResponse(new CommandeResource($commande), 'commande existante.');
        }
    }
    public function update(Commande_dechetRequest $request, Commande_dechet $commande){
        $input = $request->all();
        $commande->update($input);
        return $this->handleResponse(new CommandeResource($commande), 'commande modifié!');
    }
    public function destroy($id) {
        $commande =Commande_dechet::find($id);
        if (is_null($commande)) {
            return $this->handleError('commande dechet n\'existe pas!');
        }
        else{
            $commande->delete();
            return $this->handleResponse(new CommandeResource($commande), 'commande dechet supprimé!');
        }
    }
}
