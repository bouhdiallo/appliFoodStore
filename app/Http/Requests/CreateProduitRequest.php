<?php

namespace App\Http\Requests;

use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateProduitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return 
             [
                     'nom_produit' => 'required|string',
                     'prix' => 'required|numeric',
                     'description' => 'required',
                     'qte_en_stock' => 'required'
                ];

            }
            
            public function failedValidation(validator $validator){
                throw new HttpResponseException(response()->json([
                    'success'=>false,
                    'error'=>true,
                    'message'=> 'Erreur de validation',
                    'errorsList'=> $validator->errors()
                ]));
            }
             public function messages()
             {
                return [
                    'nom_produit.required' => 'un nom pour le produit doit etre fourni',
                    'prix.required' => 'un prix doit etre fourni',
                    'description.required' => 'une description doit etre fourni',
                    'qte_en_stock.required' => 'une qte_en_stock doit etre fourni'

                ];
             }
}
