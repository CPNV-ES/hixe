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
5. Préparez le fichier de **configuration**
    ```
    # cp .env.example .env
    # php artisan key:generate
    ```
6. Éditez le fichier `.env` :

    Note : Si cela n'est pas déjà fait, nous vous conseillons de créer une base de donnée à cette étape et de retenir son nom pour l'ajouter dans le champ ``DB_DATABASE``. 

    A. Définissez la connection à votre **Base de Donnée**, dans notre cas nous utilisons le driver mysql :
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=[DB_Name]
    DB_USERNAME=[DB_Username]
    DB_PASSWORD=[DB_Password]
    ```

    B. Pour nos expériences du côté applicatif, nous avons un utilisateur test. Il est possible de le modifier si besoin.
   
   ```
    USER_FIRSTNAME=kev
    USER_LASTNAME=pasteur
    USER_EMAIL=kev@gmail.com
    USER_PASSWORD=12345678
    USER_NUMBER=1
    USER_BIRTHDATE=2020-01-03
   ```

8. Remplir la base de donnée
    Si vous n'avez pas encore créer votre base de donnée, vous pouvez le faire comme cela.

    A. Créer les tables avec l'outil migrate
    ```
    # php artisan migrate
    ```
    B. Remplir la base de donnée avec nos seeds préfaits
    ```
    # php artisan db:seed
    ```

    Note : Si vous souhaitez **drop&restart** vos seeds car vous avez des erreurs à corriger ou que vous avez des nouveautés à implémenter, vous pouvez ``refresh`` les seeds avec la commande :
    ```
    # php artisan migrate:fresh --seed
    ```

9. Lancer le serveur
    ```
    # php artisan serve
    ```
