<?php

namespace App\Policies;

use App\Models\Publication;
use App\Models\User;

class PublicationPolicy
{
    public function update(User $user, Publication $publication): bool
    {
        // Autorise si c'est l'auteur OU si c'est un admin
        return $user->id === $publication->user_id || $user->role === 'admin';
    }

    public function delete(User $user, Publication $publication): bool
    {
        return $this->update($user, $publication);
    }
}