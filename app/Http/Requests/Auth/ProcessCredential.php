<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ProcessCredential extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $credential = ['required'];
        if(filter_var($this->input('credential'), FILTER_VALIDATE_EMAIL)) {
            $credential[] = 'email';
        }else {
            $credential[] = 'regex:/^09[0-3][0-9]{8}$/';
        }
        return [
            'credential' => $credential,
        ];
    }

    public function attributes(): array
    {
        return [
            'credential' => 'ایمیل یا شماره موبایل',
        ];
    }

}
