<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasienRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(auth()->user()->role->nama_role){
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
            'nama_pasien' => 'required|min:3|regex:/^[\pL\s\-]+$/u|max:50',
            'alamat' => 'max:200',
            'usia' => 'numeric', 
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'regex:/^[\pL\s\-]+$/u|max:50',
            'agama' => 'required'
        ];
    }
}
