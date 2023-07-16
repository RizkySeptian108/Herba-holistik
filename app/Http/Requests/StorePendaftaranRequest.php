<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePendaftaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(auth()->user()->role->nama_role === 'Admin'){
            return true;
        } 

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'pasien_id' => 'required',
            'berat_badan' => 'required',
            'keluhan' => 'regex:/^[\pL\s\-]+$/u|max:50'
        ];
    }
}
