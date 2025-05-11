<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Définition des métadonnées de base -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- Emplacement pour les styles spécifiques aux pages enfants -->
    @stack('styles')
    
    <title>MyPrettyBook</title>
    
    <!-- Style CSS intégré -->
    <style>
        /* Définition des variables CSS pour les couleurs */
        :root {
            --foret-vert: #2c5d3f;          /* Vert foncé principal */
            --foret-vert-clair: #3e7d58;    /* Vert plus clair */
            --gris-clair: #f5f7f5;          /* Arrière-plan clair */
            --texte-principal: #ffffff;      /* Texte blanc */
            --beige: #f9f3e9;               /* Beige pour accents */
            --brun: #8b5a2b;                /* Brun pour éléments secondaires */
        }

        /* Styles de base pour le corps de la page */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Georgia', serif;  /* Police classique */
            background-image: url('/images/library.jpg');  /* Image de fond */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: var(--foret-vert);      /* Couleur de texte par défaut */
            min-height: 100vh;              /* Hauteur minimale = écran */
            display: flex;
            flex-direction: column;         /* Disposition en colonne */
            position: relative;
            z-index: 0;
        }

        /* Overlay semi-transparent sur l'image de fond */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: rgba(44, 93, 63, 0.5);  /* Vert semi-transparent */
            z-index: -1;
        }

        /* Style de la barre de navigation */
        nav {
            background-color: var(--foret-vert);
            padding: 1rem 2rem;
            color: var(--texte-principal);
            font-weight: 600;
            font-size: 1.25rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);  /* Ombre portée */
        }

        /* Liens de navigation */
        nav a {
            color: var(--texte-principal);
            text-decoration: none;
            font-weight: 700;
            margin-right: 1rem;
        }

        /* Effet hover sur les liens */
        nav a:hover {
            text-decoration: underline;
        }

        /* Conteneur principal */
        .container {
            max-width: 900px;
            margin: 2rem auto;  /* Centrage horizontal */
            padding: 2rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Styles des titres */
        h1, h2, h3 {
            font-weight: 700;
            color: var(--foret-vert);
            margin-bottom: 1rem;
            text-align: center; 
        }

        /* Liste stylisée */
        ul.list-group {
            list-style-type: none;
            padding-left: 0;
            margin-bottom: 2rem;
        }

        /* Éléments de liste */
        ul.list-group li {
            background-color: #e8f0e8;
            margin-bottom: 0.75rem;
            padding: 1rem 1.25rem;
            border-left: 5px solid var(--foret-vert);
            border-radius: 4px;
            transition: background-color 0.3s ease;  /* Animation fluide */
        }

        /* Effet hover sur les éléments de liste */
        ul.list-group li:hover {
            background-color: var(--foret-vert-clair);
            color: var(--texte-principal);
            cursor: pointer;
        }

        /* Style des formulaires */
        form {
            background-color: #f5f5f5; 
            border-radius: 6px;
            padding: 2rem;
            box-shadow: 0 3px 6px rgba(44, 93, 63, 0.2);
            max-width: 600px;
            margin: 0 auto;  /* Centrage du formulaire */
        }

        /* Étiquettes des champs */
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.3rem;
            color: var(--foret-vert);
        }

        /* Champs de formulaire */
        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 0.75rem; 
            margin-bottom: 1rem;
            border: 2px solid var(--foret-vert);
            border-radius: 4px;
            font-size: 1rem;
            font-family: inherit;
            transition: border-color 0.3s ease;
        }

        /* Effet focus sur les champs */
        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {
            border-color: var(--foret-vert-clair);
            outline: none;
        }

        /* Style des boutons */
        button {
            background-color: var(--foret-vert);
            border: none;
            padding: 0.75rem 1.5rem;
            color: var(--texte-principal);
            font-weight: 700;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Effet hover sur les boutons */
        button:hover {
            background-color: var(--foret-vert-clair);
        }

        /* Alertes (messages flash) */
        .alert {
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            border-radius: 4px;
            font-weight: 600;
        }

        /* Alerte succès */
        .alert-success {
            background-color: #d3e4cd;
            color: #2c5d3f;
            border: 1px solid #a2cfa6;
        }

        /* Alerte erreur */
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Media queries pour le responsive */
        @media (max-width: 600px) {
            .container {
                margin: 1rem;
                padding: 1rem;
            }

            nav {
                font-size: 1rem;
                padding: 1rem;
            }

            form {
                padding: 1rem;
            }
        }

        /* Ajustement des icônes de pagination */
        svg.w-5.h-5 {
            width: 0.8rem;
            height: 0.8rem;
        }
    </style>
</head>
<body>
    <!-- Barre de navigation -->
    <nav>
        <a href="{{ route('welcome') }}">Accueil</a>
        <span style="margin: 0 1rem;">|</span>
        <a href="{{ route('books.index') }}">Gestion de Livres</a>
    </nav>      
    
    <!-- Conteneur principal -->
    <div class="container">
        <!-- Affichage des messages flash -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <!-- Emplacement pour le contenu spécifique des pages -->
        @yield('content')
    </div>
</body>
</html>