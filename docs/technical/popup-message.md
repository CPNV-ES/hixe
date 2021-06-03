# Popup-message 

## Description

Les messages sont utilisés lorsque nous souhaitons aviser l'utilisateur de quelque chose. 
Cela peut-être utile pour le rassurer lorsqu'une action est effectuée ou l'informer qu'une erreur s'est produite.

Exemple : Ajout d'une course, Inscription à une course. 

**Note** : Pour rediriger un utilisateur sur une route avec un message spécifique, vous aurez besoin d'importer la librarie `Redirect`.

```
use Illuminate\Support\Facades\Redirect;
```
## Utilisation
Lorsque nous effectuons des actions dans un ``controller``, nous pouvons maintenant rediriger l'utilisateur sur un routeur avec un message spécifique.

Example :
```
return Redirect::route('hikes.index')->with('warning','Hike supprimée !');
```

### Paramètres
> *...*->with(``type``, ``message``);

#### Les différents types sont :

| Type        | Description     |
| ------------- |:-------------| 
| success     | Affiche un message en vert de **succès**. | 
| warning | Affiche un message en jaune de **prévention**.      |  
| error      | Affiche un message d'**erreur** en rouge.    | 
| info | Affiche un message **informatif**.      |  