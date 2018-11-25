<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ['custID' => 'numeric|required|max:11',
                'fname' => 'alpha|required|max:20',
                'lname' => 'alpha|required|max:20',
                'email' => 'email|required|max:50',
                'street' => 'alpha_dash|nullable|max:25',
                'city' => 'alpha|nullable|max:30',
                'state' => 'alpha|nullable|max:2|min:2',
                'zip' => 'alpha_dash|nullable|max:9|min:9',
                'senha' => 'string|required|max:255'
            //
        ];
    }
    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'custID.required' => 'É obrigatório informar um ID de cliente',
            'fname.required' => 'É obrigatório informar o primeiro nome',
            'fname.alpha' => 'São permitidos apenas caracteres alfabéticos em seu nome',
            'fname.max' => 'O nome deve possuir 20 ou menos caracteres',
            'lname.required' => 'É obrigatório informar o último nome',
            'lname.alpha' => 'São permitidos apenas caracteres alfabéticos em seu nome',
            'lname.max' => 'O nome deve possuir 20 ou menos caracteres',
            'email.required' => 'É obrigatório informar um email',
            'email.email' => 'O email deve seguir a estrutura: nome@exemplo.com',
            'email.max' => 'O email deve possuir 50 ou menos caracteres',
            'street.max' => 'O nome da rua deve possuir 25 ou menos caracteres',
            'city.alpha' => 'São permitidos apenas caracteres alfabéticos no nome da cidade',
            'city.max' => 'O nome da cidade deve possuir 30 ou menos caracteres',
            'state.alpha' => 'São permitidos apenas caracteres alfabéticos na sigla do estado',
            'state.max' => 'A sigla do estado deve possuir 2 caracteres',
            'state.min' => 'A sigla do estado deve possuir 2 caracteres',
            'zip.max' => 'O zip code deve possuir 9  caracteres',
            'zip.min' => 'O zip code deve possuir 9 caracteres',
            'senha.required' => 'É obrigatório preencher o campo senha',
            'senha.max' => 'A senha deve possuir 255 ou menos caracteres'
        ];
    }
}
