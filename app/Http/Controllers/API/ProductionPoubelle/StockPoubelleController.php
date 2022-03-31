<?php
namespace App\Http\Controllers\API\ProductionPoubelle;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\ProductionPoubelle\Stock_poubelle as Stock_poubelleResource;
use App\Models\Stock_poubelle;
use App\Http\Requests\ProductionPoubelle\StockPoubelleRequest;

class StockPoubelleController extends BaseController{
    public function index(){
        $stock_poubelle = Stock_poubelle::all();
        return $this->handleResponse(Stock_poubelleResource::collection($stock_poubelle), 'Affichage stock poubelle');
    }
    public function store(StockPoubelleRequest $request){
        $input = $request->all();
        $stock_poubelle = Stock_poubelle::create($input);
        return $this->handleResponse(new Stock_poubelleResource($stock_poubelle), 'stock poubelle crée!');
    }
    public function show($id){
        $stock_poubelle = Stock_poubelle::find($id);
        if (is_null($stock_poubelle)) {
            return $this->handleError('stock poubelle n\'existe pas!');
        }else{
            return $this->handleResponse(new Stock_poubelleResource($stock_poubelle), 'stock poubelle existe.');
        }
    }
    public function update(StockPoubelleRequest $request, Stock_poubelle $stock_poubelle){
        $input = $request->all();
        $stock_poubelle->update($input);
        return $this->handleResponse(new Stock_poubelleResource($stock_poubelle), 'stock poubelle modifié!');
    }
    public function destroy($id){
        $stock_poubelle =Stock_poubelle::find($id);
        if (is_null($stock_poubelle)) {
            return $this->handleError('stock poubelle n\'existe pas!');
        }
        else{
            $stock_poubelle->delete();
            return $this->handleResponse(new Stock_poubelleResource($stock_poubelle), 'stock poubelle supprimé!');
        }
    }
}
