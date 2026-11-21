<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Pour le SoftDeletes

class Publication extends Model
{
    use HasFactory, SoftDeletes;

    // Ajoute cette ligne pour autoriser le remplissage de ces colonnes
    protected $fillable = [
        'titre',
        'contenu',
        'categorie_id',
        'user_id',
        'image', // Si tu as ajouté la colonne image au TP précédent
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function auteur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}