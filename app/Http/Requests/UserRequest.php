<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'min:2', 'max:255',],
            'email' => ['required', 'min:2', 'max:255', 'email'],

        ];

        if (!empty($this->user)) {
            $rules['email'][] = Rule::unique('users')->ignore($this->user->id);
        } else {
            $rules['email'][] = Rule::unique('users');
            $rules['password'] = ['required', Password::min(8)->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()];
        }

        return $rules;

    }
}
