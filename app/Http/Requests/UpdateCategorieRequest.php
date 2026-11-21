<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategorieRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // On ignore la catégorie actuelle pour la règle unique
            'nom' => [
                'required', 'string', 'max:255',
                Rule::unique('categories', 'nom')->ignore($this->categorie),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom de la catégorie est obligatoire.',
            'nom.unique' => 'Cette catégorie existe déjà.',
        ];
    }
}