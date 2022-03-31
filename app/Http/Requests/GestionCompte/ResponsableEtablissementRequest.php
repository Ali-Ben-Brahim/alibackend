<?php

namespace App\Http\Requests\GestionCompte;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class ResponsableEtablissementRequest extends FormRequest{
    public function authorize()
    {
        return true;
    }
    public function rules()  {
        if ($this->isMethod('post')) {
            return [
            'nom' => 'required|string|regex:/^[A-Za-z ]*$/i',
            'prenom' => 'required|string|regex:/^[A-Za-z ]*$/i',
            'CIN' => 'required|numeric',
            // 'photo' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|max:50',
            'mot_de_passe' => 'required|string|min:6',
            'numero_telephone'=> 'required|integer',

            ];
         }else if($this->isMethod('PUT')){
             return [
            // 'nom' => 'required|string|regex:/^[A-Za-z ]*$/i',
            // 'prenom' => 'required|string|regex:/^[A-Za-z ]*$/i',
            // 'CIN' => 'required|numeric',
            // 'photo' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'email' => 'required|email|max:50',
            // 'mot_de_passe' => 'required|string|min:6',
            // 'numero_telephone'=> 'required|integer',

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
