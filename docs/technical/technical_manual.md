# Documentation technique

<<<<<<< HEAD
Bob est un développeur qui vient de rejoindre l'équipe de développement du TRUC. Ce document répond aux questions qu'il se pose.
=======

-   [Manuelle technique](#manuelle-technique)
    -   [Gestion des styles CSS](#gestion-des-styles-css)
    -   [Charte graphique](#charte-graphique)
    -   [Gestion des champs dates sur le client](#gestion-des-champs-dates-sur-le-client)
    -   [Popup-message](#popup-message)
        -   [Description](#description)
        -   [Utilisation](#utilisation)
        -   [Paramètres](#paramètres)
            -   [Les différents types sont :](#les-différents-types-sont-)
    -   [Roles](#roles)
        -   [Slug](#slug)
        -   [Utilisations](#utilisations)
            -   [Relation](#relation)
            -   [Roles](#roles-1)
    -   [OAuth](#oauth)
        -   [Configuration](#configuration)
        -   [Github](#github)
        -   [Laravel](#laravel)
    -   [Import csv](#import-csv) - [Model csv](#model-csv)
        > > > > > > > 703a488c741322d34f702deb30344d2e27094648

### A quoi sert Hixe ? Qui l'utilise et pourquoi ?

Il s'agit d'un gestionnaire de courses pour le [CAS de Sion](https://www.clubalpinsion.ch/) on peut notamment administrer(crud) des courses sous la dénomination de "hikes". Sur chaque hike un guide peut être attribué à la course ainsi que plusieurs participant en fonction des limites de participants définit par course.

Au-delà de pouvoir créer, afficher, modifier, dupliquer une hike. Hixe possède aussi un gestionnaire de multi-courses, lui permettant de créer des courses importées / exportées de fichiers CSV. De plus, il est aussi possible de modifier rapidement les rôles d'utilisateur si cela est necessaire.

### Dans quel contexte (technique) fonctionne Hixe ?

Hike est une application web utilisant le framework [Laravel](https://laravel.com/docs/6.x) qui est basé sur le langague de programmation [PHP](https://www.php.net/). Node est utilisé pour transpiler certains assets comme bootstrap, jquery, etc... (Voir package.json). Utilise une base de données relationnel commune MySQL.

| Nom     | Version   |
| ------- | --------- |
| Laravel | 6.x       |
| PHP     | 7.4       |
| Node    | 15.6.0    |
| MySQL   | 5.7.34-37 |

L'application en production est déployé chez l'hébergeur swisscenter à l'aide de capistrano et d'une configuration de déploiement déjà existante lors de la prise en main du projet.

l'application à besoin d'internet pour pouvoir utiliser l'authentification à l'aide du OAuth et télécharger les différentes dépendences.

Github a été choisit comme fourniseur pour effectuer des tests, mais à terme le but est d'implémenter l'oauth directement sur le site existant dans l'objectif de lier les comptes.

### Que puis-je faire pour tester la version actuelle de notre application ?

C'est très simple, il suffit de lire les étapes que nous avons décrites [ici](https://github.com/CPNV-ES/hixe#installation).

N'oubliez pas de choisir la branche github correcte. Sachant que nous utilisisons la méthodologie Gitflow..

### MLD de notre base de donnée

![MLD](https://github.com/CPNV-ES/hixe/blob/develop/docs/database/schema_2021_06_10.png?raw=true)

### De quels composants Hixe est-il fait ?

composer.json

```json=
{
    "require": {
        "php": "^7.2",
        "darkaonline/l5-swagger": "6.*",
        "fideloper/proxy": "^4.0",
        "laravel/framework": "^6.0",
        "laravel/socialite": "^4.3", // OAuth
        "laravel/tinker": "^1.0"
    },
    "require-dev": {
        "barryvdh/laravel-debugbar": "^3.2",
        "facade/ignition": "^1.4",
        "fzaninotto/faker": "^1.4", // Generation de valeur aléatoire
        "laravel/ui": "^1.1",
        "mockery/mockery": "^1.0",
        "nunomaduro/collision": "^3.0",
        "phpunit/phpunit": "^8.0"
    }
}
```

package.json

```json=
{
    "devDependencies": {
        "axios": "^0.19",
        "bootstrap": "^4.0.0",
        "browser-sync": "^2.26.14",
        "browser-sync-webpack-plugin": "^2.0.1",
        "cross-env": "^5.1",
        "jquery": "^3.5.1",
        "laravel-mix": "^4.0.7",
        "lodash": "^4.17.13",
        "popper.js": "^1.12",
        "resolve-url-loader": "^2.3.1",
        "vue-template-compiler": "^2.6.11"
    },
    "dependencies": {
        "datatables.net-autofill-bs4": "^2.3.5", // Plugin affichage des tableaux
        "datatables.net-bs4": "^1.10.21", // Affichage des tableaux de hikes
        "datatables.net-buttons-bs4": "^1.6.2", // Plugin affichage des tableaux
        "datatables.net-fixedheader-bs4": "^3.1.7", // Plugin affichage des tableaux
        "datatables.net-keytable-bs4": "^2.5.2", // Plugin affichage des tableaux
        "datatables.net-responsive-bs4": "^2.2.5", // Plugin affichage des tableaux
        "datatables.net-rowgroup-bs4": "^1.1.2", // Plugin affichage des tableaux
        "datatables.net-scroller-bs4": "^2.0.2", // Plugin affichage des tableaux
        "datatables.net-searchpanes-bs4": "^1.1.1", // Plugin affichage des tableaux
        "eonasdan-bootstrap-datetimepicker": "^4.17.49",
        "fullcalendar": "^3.10.2",
        "jszip": "^3.2.2",
        "moment": "^2.26.0",
        "pdfmake": "^0.1.64",
        "sass": "^1.32.6",
        "sass-loader": "^7.3.1"
    }
}
```

### Quelles technologies est-ce que je dois connaître pour pouvoir développer ce TRUC ?

Pour pouvoir travailler sur ce projet il faut comprendre les principes suivant

-   L'OAuth 2
-   Structure MVC
-   Laravel
    -   Blade
    -   Eloquent
    -   Migration
    -   Seeders
    -   Factories

Il faut maitriser :

-   PHP
-   MYSQL
-   JS
-   Bootstrap
-   SCSS
-   HTML

Pourquoi tous ces choix

Le framework est laravel était la technologie imposer lors du début du projet, nous avons donc continuer sur cette lancer. Nous avons fais une étude pour savoir s'il était intéressant de mettre à jour la version du framework et nous avons éstimer que non pour l'instant parce qu'il s'agit de la version LTS (Long Term Support). Cette étude devra peut être réaliser de nouveaux pour les prochains développeurs pour migrer vers la prochaine version LTS de Laravel.

Pour l'authentification OAuth on a utilisé socialite qui est un des choix proposé par la documentation Laravel

Sinon le combo PHP, MySQL est un combo très commun possédant beaucoup de documentation. le JS, le scss, html permete de réaliser des pages à l'aide de blade qui est le template engine fournis par Laravel

### Qu'est-ce que je dois installer sur mon poste de travail pour pouvoir commencer à bosser sur Hixe ?

Il vous faudra valider que les pré-requis suivants soient bien installés sur votre machine :

| Logiciel | Version          | Check Version        |
| -------- | ---------------- | -------------------- |
| composer | 1.9              | `composer --version` |
| npm      | 6.9.0            | `npm -v`             |
| Node     | 15.6.0           | `node -v`            |
| git      | 2.23             | `git -version`       |
| MySQL    | 8.0.17 for Win64 | `mysqld --version`   |

### Quelles sont les pratiques appliquées dans ce groupe ?

Lorsque nous créons un nouvel incrément à notre projet, nos utilisons git flow. De plus, nous utilisons la convention de nommage [snake_case](https://en.wikipedia.org/wiki/Snake_case) pour écrire le nom de nos features.

## Design technique

Voir les détails [ici](./technical_details.md)
