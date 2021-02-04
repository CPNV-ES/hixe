# Hixe

(De l'anglais "Hikes" (randonnées) écrit phonétiquement)

Hixe est un site qui facilite l'organisation de courses en montagnes de niveaux de difficulté variable.

Au delà de la problématique standard de fixer une date et rassembler un groupe de participants, Hixe permet de définir des critères d'équipement et de difficulté technique d'une course.

La documentation utilisateur se trouve [là](https://github.com/CPNV-ES/hixe/tree/master/docs/user), les documents à caractère technique [ici](https://github.com/CPNV-ES/hixe/tree/master/docs/technical) et si vous voulez installer Hikes sur un poste de développement, rendez-vous [ici](https://github.com/CPNV-ES/hixe/tree/master/docs/install).

# Installation

1. Valider que les pré-requis suivants sont bien installés sur votre machine
   
    | Logiciel | Min Version      | Commande             |
    | :------- | :--------------- | :------------------- |
    | composer | 1.9              | `composer --version` |
    | npm      | 6.9.0            | `npm -v`             |
    | git      | 2.23             | `git -version`       |
    | MySQL    | 8.0.17 for Win64 | `mysqld --version`   |

2. Copier le `Repo` Github dans votre répertoire de travail
    ```
    git clone https://github.com/CPNV-ES/hixe.git
    ```
3. Installer les dépendances
    ```
    # cd hixe
    # composer i
    # npm i
    ```
4. Transpiler les assets CSS et Javascript
    ```
    # npm run dev
    ```
5. Préparez l'environnement d'exécution
    ```
    # cp .env.example .env
    # php artisan key:generate
    ```
6. Définnisez la DB pour Laravel en éditant le fichier `.env` en fonction de votre éditeur MySQL
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=[DB_Name]
    DB_USERNAME=[DB_Username]
    DB_PASSWORD=[DB_Password]
    ```
7. Ajouter un utilisateur pour la connection via le .env
   
   Copier le code ci-dessous dans votre `.env`
   ```
    USER_FIRSTNAME=kev
    USER_LASTNAME=pasteur
    USER_EMAIL=kev@gmail.com
    USER_PASSWORD=12345678
    USER_NUMBER=1
    USER_BIRTHDATE=2020-01-03
   ```
    Informations :

    - Si les champs ci-dessus sont vide -> erreur message : .env incomplet
    - Si les champs si dessus ne corresponde pas à un utilisateur dans la DB -> le crée
    - Si les comps si le mots de passe ou l'email est faut -> erreur message : Accès refusé

8. Effectuer la migration de la base de données
    ```
    # php artisan migrate
    ```
9. Ajouter dans la base de données le Status: `En cours` dans la table **status** avec l'`id`: 1
    ```sql
    INSERT INTO `states` (`id`, `name`) VALUES ('1', 'En cours');
    ```
10. Lancer le serveur
    ```
    # php artisan serve
    ```
