# OAuth

L'OAuth est actuellement fournie par Github

# Configuration

Pour utiliser Github en tant que Provider OAuth il faut [créer une nouvelle application](https://github.com/settings/applications/new).

## Github

Pour un environnement de développement: 

![](images/OAuth.png)

Créez un nouveau `client secret`.

## Laravel

Ajoutez les variables suivantes au `.env` :

```
GITHUB_ID=<Client ID>
GITHUB_SECRET=<Client secrets>
GITHUB_URL=<Authorization callback URL>
```