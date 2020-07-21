<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AircraftRequest extends FormRequest
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
            'name'          => [ 'required', Rule::unique('aircrafts', 'name')->ignore($this->aircraft) ],
            'passengers'    => 'required',
            'plates'        => 'required',
            'calendar_id'   => 'required',
            'image'         => 'sometimes|required|mimes:jpeg,png',
        ];
    }

    /**
     * It loads validation messages
     * 
     */
    public function messages()
    {
        return [
            'name'          => __('Type'),
            'passengers'    => __('Passengers'),
            'plates'        => __('Plates'),
            'calendar_id'   => __('Calendar Id'),
            'image'         => __('Image')
        ];
    }
}
