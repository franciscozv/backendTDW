<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class InteraccionRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'perro_interesado_id' => 'required|exists:perros,id',
            'perro_candidato_id' => 'required|exists:perros,id|different:perro_interesado_id',
            'preferencia' => 'required|in:a,r',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es requerido',
            'integer' => 'El campo :attribute debe ser un número entero',
            'numeric' => 'El campo :attribute debe ser un número',
            'exists' => 'El :attribute debe existir en nuestro sistema',
            'boolean' => 'El campo :attribute debe ser un valor tipo boolean',
            'required_unless' => 'El campo :attribute es requerido condicionalmente',
            'required_with_all' => 'El campo :attribute es requerido condicionalmente',
            'required_with' => 'El campo :attribute es requerido condicionalmente',
            'required_if' => 'El campo :attribute es requerido condicionalmente',
            'string' => 'El campo : attribute debe ser de tipo string',
            'unique' => 'El campo :attribute debe ser único en nuestro sistema',
            'max' => 'El campo :attribute supera el largo máximo permitido',
            'array' => 'El campo :attribute debe ser de tipo array',
            'different' => 'El perro interesado debe ser distinto al candidato',
            'in' => 'La preferencia debe ser a o r'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()->all(), Response::HTTP_BAD_REQUEST)
        );
    }
}