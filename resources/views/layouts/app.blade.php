<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta', 'Bienvenue sur MediaHub')">
    <title>@yield('titre', 'MediaHub')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('partials.navigation')

    <main class="conteneur">
        @yield('contenu')
            @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border: 1px solid #f5c6cb; margin: 20px auto; max-width: 800px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            @if (session('succes'))
        <div style="background-color: #d4edda; color: #155724; padding: 15px; border: 1px solid #c3e6cb; margin: 20px auto; max-width: 800px; text-align: center;">
            {{ session('succes') }}
        </div>
            @if (session('erreur'))
        <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border: 1px solid #f5c6cb; margin: 20px auto; max-width: 800px; text-align: center;">
            {{ session('erreur') }}
        </div>
    @endif
    @endif
    </main>

    @include('partials.pied-de-page')
</body>
</html>