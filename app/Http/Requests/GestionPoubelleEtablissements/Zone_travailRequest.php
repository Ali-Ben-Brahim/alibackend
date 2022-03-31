<?php

namespace App\Http\Requests\GestionPoubelleEtablissements;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class Zone_travailRequest extends FormRequest{
    public function authorize()
    {
        return true;
    }
    public function rules()  {
        if ($this->isMethod('post')) {
            return [
                'region' => 'required|string',
                'quantite_total_collecte_plastique'=> 'required|between:0,100000000',
                'quantite_total_collecte_composte'=> 'required|between:0,100000000',
                'quantite_total_collecte_papier'=> 'required|between:0,100000000',
                'quantite_total_collecte_canette'=> 'required|between:0,100000000',

            ];
        }else if($this->isMethod('PUT')){
            return [
            //     'region' => 'required|string',
            //     'quantite_total_collecte_plastique'=> 'required|between:0,100000000',
            //     'quantite_total_collecte_composte'=> 'required|between:0,100000000',
            //     'quantite_total_collecte_papier'=> 'required|between:0,100000000',
            //     'quantite_total_collecte_canette'=> 'required|between:0,100000000',
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
