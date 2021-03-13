<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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
     * $requests = $this->validate([
      *      'user' => 'required|integer', 'nombre_negocio'  =>'required', 'nombre_encargado' => 'required', 'direccion' => 'required', 'ciudad' => 'required', 'estado'  => 'required', 'cp' => 'required|max:6', 'telefono' => 'required|max:10', 'status' => 'required|in:DRAFT,PUBLISHED', 'logo'  => 'mimes: jpg, jpeg, png' ]);
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'user'                              => 'required|integer',
            'nombre_negocio'        => 'required',
            'nombre_encargado'   => 'required',
            'direccion'                    => 'required',
            'ciudad'                        => 'required',
            'estado'                       => 'required',
            'cp'                              => 'required|max:6',
            'telefono'                    => 'required|max:10',
            'status'                       => 'required|in:DRAFT,PUBLISHED',

        ];

        if($this->get('file'))
            $rules = array_merge($rules, ['file'         => 'mimes:jpg,jpeg,png']);

        return $rules;
    }
}
