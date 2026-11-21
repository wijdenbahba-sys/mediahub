<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategorieRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // On autorise tout le monde pour l'instant
    }

    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255|unique:categories,nom',
        ];
    }

    // Messages d'erreur personnalisés
    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom de la catégorie est obligatoire.',
            'nom.unique' => 'Cette catégorie existe déjà.',
        ];
    }
}