@extends('layouts.app')
@section('titre', 'Inscription')

@section('contenu')
    <div style="max-width: 500px; margin: auto;">
        <h1>Créer un compte</h1>
        <form action="{{ route('inscription') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <div style="margin-bottom: 15px;">
                <label>Nom :</label><br>
                <input type="text" name="name" value="{{ old('name') }}" required style="padding: 8px; width: 100%;">
            </div>
            <div style="margin-bottom: 15px;">
                <label>Email :</label><br>
                <input type="email" name="email" value="{{ old('email') }}" required style="padding: 8px; width: 100%;">
            </div>
            <div style="margin-bottom: 15px;">
                <label>Mot de passe :</label><br>
                <input type="password" name="password" required style="padding: 8px; width: 100%;">
            </div>
            <div style="margin-bottom: 15px;">
                <label>Confirmer le mot de passe :</label><br>
                <input type="password" name="password_confirmation" required style="padding: 8px; width: 100%;">
            </div>
            <button type="submit" style="background: #2c3e50; color: white; padding: 10px 20px; border: none; cursor: pointer;">S'inscrire</button>
        </form>
    </div>
@endsection