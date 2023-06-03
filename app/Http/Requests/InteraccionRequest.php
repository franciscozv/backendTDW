<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InteraccionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'perro_interesado_id' => ['required|exists:perros,id',
            Rle::notIn([$this->input('perro_candidato_id')]),
        ],
            'perro_candidato_id' => [
                'required',
                'exists:perros,id',
                Rule::unique('interaccions')->where(function ($query) {
                    $query->where('perro_interesado_id', $this->input('perro_interesado_id'));
                }),
                Rule::notIn([$this->input('perro_interesado_id')]),
            ],
            'preferencia' => 'required|in:a,r',
        ];
    }
}
