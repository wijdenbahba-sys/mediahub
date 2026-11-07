<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Publication; 
use App\Models\User;
class Commentaire extends Model
{
    public function publication()
{
    return $this->belongsTo(Publication::class);
}

public function auteur()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
