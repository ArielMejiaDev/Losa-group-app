<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                      => [ 'required', Rule::unique('properties', 'name')->ignore($this->property) ],               
            'address'                   => 'required',
            'parking'                   => 'required',
            'rooms'                     => 'required',
            'beds'                      => 'required',
            'maintenance_person'        => 'required',
            'maintenance_phone'         => 'required',
            'maps_link'                 => 'required',
            'wifi_network'              => 'required',
            'wifi_password'             => 'required',
            'info_phone'                => 'required',
            'reception_phone'           => 'required', 
            'calendar_id'               => 'required',
            'image'                     => 'sometimes|required|mimes:jpeg,png',
        ];
    }

    /**
     * It returns custom messages
     */
    public function messages()
    {
        return [
            'name'                      =>      'Nombre',                 
            'address'                   =>      'Direccion',
            'parking'                   =>      'Parqueo',             
            'rooms'                     =>      'Cuartos',
            'beds'                      =>      'Camas',   
            'maintenance_person'        =>      'Persona de mantenimiento',
            'wifi_network'              =>      'Red wifi',        
            'wifi_password'             =>      'Clave de la red wifi',
            'info_phone'                =>      'Número de teléfono información',
            'reception_phone'           =>      'Número de teléfono de recepción',
            'calendar_id'               =>      'Código único del calendario',
            'maintenance_phone'         =>      'Telefono de persona de mantenimiento',
            'image'                     =>      'Imagen'
        ];
    }

}
