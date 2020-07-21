<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'                      =>      'required',
            'email'                     =>      'required|email',
            // 'dpi'                       =>      'required',
            // 'vencimiento_dpi'           =>      'required|date',
            // 'licencia_conducir'         =>      'required',
            // 'vencimiento_licencia'      =>      'required|date',
            // 'visa'                      =>      'required',
            // 'vencimiento_visa'          =>      'required|date',
            // 'pasaporte'                 =>      'required',
            // 'vencimiento_pasaporte'     =>      'required|date',
            // 'seguro_vida'               =>      'required',
            // 'seguro_medico'             =>      'required',
            // 'tipo_sangre'               =>      'required|regex:/^([A-Z\s\-\+\(\)]*)$/',
            // 'phone'                     =>      'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            // 'contacto_losa'             =>      'required|boolean',
            // 'status'                    =>      'required|boolean'
        ];
    }

    /**
     * It returns custom messages for contacto_general_losa and status
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'contacto_general_losa'     =>      'Contacto General de Losa',
            'status'                    =>      'Status del usuario'
        ];
    }

}
