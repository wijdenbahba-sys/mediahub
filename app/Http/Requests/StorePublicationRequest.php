<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePublicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titre' => 'required|string|min:10|max:255|unique:publications,titre',
            'contenu' => 'required|string|min:20',
            'categorie_id' => 'required|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'titre.required' => 'Le titre est obligatoire.',
            'contenu.min' => 'Le contenu doit faire au moins 20 caractères.',
            'categorie_id.exists' => 'La catégorie choisie n\'existe pas.',
        ];
    }
}