<?php

namespace sistemacitas\Http\Requests;

use sistemacitas\Http\Requests\Request;

class ClienteFormRequest extends Request
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
            'nombre'=>'required|max:45',
            'contacto'=>'required|max:45',
            'email'=>'max:45',
            'telefono'=>'max:45',
            'celular'=>'max:45',
            'direccion'=>'max:250',
            'kilometraje'=>'max:45'
        ];

    }
}
