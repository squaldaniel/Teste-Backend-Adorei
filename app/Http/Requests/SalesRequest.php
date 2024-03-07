<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class SalesRequest extends FormRequest
{
    // protected $redirect = '/teste';
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
        return [
            'products' => 'required|array'
        ];
    }
    public function messages()
    {
        return [
            'products.required' => 'products is required',
            'products.array' => 'products should be array'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $response = [
            'erros' => $validator->errors(),
        ];

        throw new ValidationException($validator, response()->json($response, 422));
    }
}
