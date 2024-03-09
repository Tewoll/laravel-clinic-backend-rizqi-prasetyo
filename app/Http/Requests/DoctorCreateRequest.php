<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorCreateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'specialization' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20', 'unique:doctors'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:doctors'],
            'address' => ['required', 'string', 'max:255'],
            'shift' => ['required', 'string', 'max:255'],
        ];
    }
}
