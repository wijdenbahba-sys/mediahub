<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titre', 'MediaHub')</title>
    <!-- Lien vers le CSS (on va le créer après) -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>
<body>
    
    <!-- On inclut la navigation -->
    @include('partials.navigation')

    <main class="conteneur">
        <!-- C'est ici que le contenu des pages va s'injecter -->
        @yield('contenu')
    </main>

    <!-- On inclut le pied de page -->
    @include('partials.pied-de-page')

</body>
</html>