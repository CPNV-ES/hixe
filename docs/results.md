# 📝 Bilan

## ❔ Le projet, c'est quoi ?

Hixe est un projet fonctionnant en complément du site web du groupe de Sion du Club Alpin Suisse. Il permet aux membres du Club Alpin de Sion de s'inscrire à des courses en montagne.

Hixe doit s'interfacer avec le site du Club Alpin de Sion

Le but de Hixe et de permettre la gestion de courses en montagne pour le Club Alpin Suisse groupe de Sion
Leur club possède un site utilisant Joomla et cette plateforme est une extension séparer du site principale mais les comptes serait lier entre les deux site à l'aide de l'OAuth.

## 📎 Ce que l'on a reçu

### 💪 Forces

-   Structures de la base de données

#### Initial

![initial](https://codimd.s3.shivering-isles.com/demo/uploads/upload_69fe3919357f007fd3640e72a8d171d9.png)

#### Final

![final](https://codimd.s3.shivering-isles.com/demo/uploads/upload_79265e01311692e92e6f41fdb886ab4e.png)

-   Seeders
-   Respect de l'architecture laravel

### ☹️ Défauts

-   Reprise du project difficile, problèmes lors de la mise en place du projet chez certaines personnes
-   Application peu stable, erreurs Larvel lors de l'utilisation de l'application
-   Authentification avec variables d'environement

## ☑️ Apport produit

### Gestions des rôles

#### Middleware

Mise en place d'un middleware "RoleAuthorization" qui permet de restraindre l'accès d'une route ou de certaines ressources en fonction du role de l'utilisateur.

#### Attributions de roles aux utilisateurs

Les utilisateurs on désomait un role qu'ils leur sont attribué par défaut de manière globale sur la plateforme ainsi qu'un role spécifique par course.

### Gestions de l'attribution des rôles utilisateurs

Les administrateurs peuvent accéder à un liste des utilisateurs.

Il devient donc facile de modifier le rôle d'un utilisateur.

### Améliorations du calendrier

Les courses s'affichant dans le calendrier sont chargées mois par mois au lieu de les chargées toutes en même temps.

Les courses s'affichant dans le calendrier peuvent être filtrée par type de course et difficulté.

### Création d'une charte graphique

Nous avons créé une charte graphique (consultable [ici](https://github.com/CPNV-ES/hixe/blob/1.2.0/docs/technical/graphical_charter/graphical_charter.md)), permettant de nous accorder sur les composants graphiques à utiliser lors de la création - ou l'amélioration - de page.

### Création de popup-message

Il est maintenant possible d'envoyer des messages sous forme de popup afin de prévenir l'utilisateur.

Vous pouvez accéder à la documentation [ici](https://github.com/CPNV-ES/hixe/blob/1.2.0/docs/technical/graphical_charter/graphical_charter.md).

### Étude de faisabilité - migration vers laravel 8.0

Analyse de la complexité pour faire une migration de la version actuelle (6.x) de laravel vers la version 8 qui est la version la plus récente actuellement.

Conclusions la version 6.x est LTS (Long Term Support) du coup ce n'est pas intéressant de faire la mise à jour pour l'instant par rapport aux dates de fin de support de la version laravel 8

### Amélioration de l'interface

-   Définition d'une charte graphique
-   Ajout de bouton pour créer une course dans une course
-   Système de flash-messages standardisé

### Ajout des types de courses

Un administrateur peut attribuer un type à une course.

### Importation des courses à partir d'un fichier CSV

L'importation de fichier csv sert à importer une multitude de course à l'aide d'un seul fichier csv.

-   Si la course est valide, il y aura une coche en vert pour l'affirmer.
-   Au contraire si la course ne passe pas les validations, il ne pourra pas être importé et sera mis en évidence. Un message concernant l'erreur est affiché lors du survol.
-   Les courses seront importées lorsqu'on aura cliqué sur le bouton sauver.

### Exporter un model CSV

Le model sert à voir visuellement un exemple de comment entrer les différentes données des diverses courses.  
**L'exemple en question ne peut pas être importé.**

TODO : le workflow des erreurs

### Recherche des participants à une course (barre de recherche)

Il est désormais possible de chercher à quelle course participe une personne.

### Duplication d'une course

Rajout d'un bouton au niveau des actions possibles sur une course pour dupliquer ladite course en récupérant le détail de la course pour le mettre dans le formulaire de création d'une nouvelle course.

### Inscription des utilisateurs à une course

### Authentification par OAuth (GitHub)

L'authentification se fait désormais par Github, il est possible de récupérer des informations telles que le prénom et l'adresse email.

### Ajout de la documentation d'API avec Swagger

Il est possible de générer la documentation d'API à l'aide de la commande `php artisan l5-swagger:generate`.

## Bilan de la marche de projet

### Gestion de projet

Lors de certaines Sprint Review, il s'est avéré que nous manquions de préparation. Nous avons réussi à améliorer ce point lors des derniers sprints en prennant plus de temps de préparation en amont de la review. Nous pouvions donc valider que les fonctionnalités développée lors du sprint qui ne rencontraient aucune erreur lors de la présentation.

#### Meilleur tracking du temps de travail

Le télétravail à impacté la façon de travailler de notre groupe, il était en effet plus simple de se détourner des tâches à effectuer, notamment à cause de toutes les distractions qu'amène le fait de travailler dans le cadre personnelle

#### L'écriture de stories est compliquée

Il a par moment été compliqué de comprendre le but de certaines stories et les tests de ces stories quelques jours après l'écriture de celles-ci Nous avions, au début du projet, choisi d'écrire les stories en Anglais, une décision qui à également rendu l'écriture des stories plus compliquée et qui à pu contribuer à la mauvaise écriture et compréhension.

#### Écriture de tests

L'écriture de tests aurait été bénéfique pour enlever les ambigüités liées à l'écriture et la compréhension des stories. Des tests auraient également été utiles pour éviter certains regressions dans le projet lors de l'implémentation de nouvelles fonctionnalités.

#### Stories sans apport produit

Nous avons desfois identifer des éléments à améliorer au sein de Hixe, mais ces améliorations apportaient peu d'apport au produit final. Il était donc difficile de justifier vouloir travailler sur ces éléments qui pourtant nous semblaient important et pouvaient peut-être accélérer la suite du développement.

## Pistes d'améliorations possibles

Pour le prochain groupe, nous conseillons qu'ils s'approprient le projet actuel et inclus le client dans les discussions.

### Produit

-   Validations des formulaires
-   Documentation swagger (routes non documenté)
-   Liste des utilisateurs

## Gestion

-   Ecriture des tests avec le PO pour éviter les ambigüités
