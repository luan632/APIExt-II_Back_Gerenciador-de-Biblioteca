<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->user()->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'cpf' => [
                'required', 
                'string', 
                'size:11',
                Rule::unique(User::class)->ignore($userId),
                function ($attribute, $value, $fail) {
                    // Validação básica de CPF (opcional)
                    if (!preg_match('/^\d{11}$/', $value)) {
                        $fail('O CPF deve conter exatamente 11 dígitos.');
                    }
                },
            ],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($userId),
            ],
        ];
    }
}