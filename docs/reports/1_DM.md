Prise en charge le 10 octobre, par Dylan Migewant

# Analyse du problème

## Fonctionnement actuel

La page de visualisation de tous les hikes n'existe pas.

## Description du problème

On veut afficher tous les hikes de la base de données avec les colonnes suivantes :

- Date
- Destination
- Guide
- Nombre de personnes inscrites
- Nombre maximum de personnes
- État du hike

## Description de la solution

Il faut créer une nouvelle route, vue et le modèle pour interroger la base de données.

(Terminé, le ...)

# Plan d'intervention

- Créer une route
- Créer une vue
- Créer une classe Hike
- Depuis le contrôleur, obtenir tous les hikes et retourner les attributs pour les afficher dans la vue (ATTENTION: il y a également des attributs qui doivent être obtenus depuis d'autres tables comme le guide)

(Terminé, le ...)

# Tests

1. Insérer des données dans la base de données
2. Lancer la commande `php artisan serve`
3. Aller sur /hixes et vérifier que les hikes sont correctement affichés

# Commit / Merge

Commit le 31 octobre 2019 vers 8:15

# Revue de code

(Effectuée, le ...)

# Documentation

(Mise à jour, le ...)

