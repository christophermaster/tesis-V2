<?php

namespace Gestion\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatterFormRequest extends FormRequest
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
        return [
            'id_catedra'=>'required',
            'nombre' =>'required|max:100',
            'descripcion' => 'required|max:512'
        ];
    }
}