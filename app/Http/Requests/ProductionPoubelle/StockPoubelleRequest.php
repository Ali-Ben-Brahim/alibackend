<?php

namespace App\Http\Requests\ProductionPoubelle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class StockPoubelleRequest extends FormRequest{
    public function authorize()
    {
        return true;
    }
    public function rules(){
        if ($this->isMethod('post')) {
            return [
                'quantite_disponible_plastique' => 'required|between:0,99999999999',
                'quantite_disponible_canette' => 'required|between:0,99999999999',
                'quantite_disponible_composte' => 'required|between:0,99999999999',
                'quantite_disponible_papier' => 'required|between:0,99999999999',
                'capacite_poubelle' => 'required|between:0,99999999999',
            ];
        }else if($this->isMethod('PUT')){
            return [
            //     'quantite_disponible_plastique' => 'required|between:0,99999999999',
            //     'quantite_disponible_canette' => 'required|between:0,99999999999',
            //     'quantite_disponible_composte' => 'required|between:0,99999999999',
            //     'quantite_disponible_papier' => 'required|between:0,99999999999',
            //     'capacite_poubelle' => 'required|between:0,99999999999',
             ];
        }

    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Validation errors',
                'data'      => $validator->errors()
            ]));
    }
}
