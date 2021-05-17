# Hikes - Graphic Charter

## Goals
The objectif of a graphic charter is to know how to properly implement views with its objects (Buttons, Tags, ...).

# Objects
This project uses Bootstrap as CSS framework and font-awesome for icons. 

## Buttons
In fact, buttons are generaly blue.

### Default Button

```html
    <a href="..." class="btn btn-primary"> Créer une nouvelle course </a>
```


![default_button](https://raw.githubusercontent.com/CPNV-ES/hixe/feature/graphic_charter/docs/technical/graphic_charter/img/default_button.PNG)

The first one is the default button, is used for basic-actions that doesn't need icons or special code color.

### Edit Button

```html
<a href="..." class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
```
The edit button : 
![edit_button](https://raw.githubusercontent.com/CPNV-ES/hixe/feature/graphic_charter/docs/technical/graphic_charter/img/edit_button.PNG)

When the button is hover, it looks like that :

![edit_button_hover](https://github.com/CPNV-ES/hixe/blob/feature/graphic_charter/docs/technical/graphic_charter/img/edit_button_hover.PNG?raw=true)

The edit button is used when the button's goal is to modify something.


### Destroy button

```html
<a href="..." class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
```
The destroy button, also called delete button or the trash.

![destroy_button](https://raw.githubusercontent.com/CPNV-ES/hixe/feature/graphic_charter/docs/technical/graphic_charter/img/destroy_button.PNG)  

When the button is hover,
it looks like that :

![destroy_button_hover](https://raw.githubusercontent.com/CPNV-ES/hixe/feature/graphic_charter/docs/technical/graphic_charter/img/destroy_button_hover.PNG)  

# Hikes states & Badges 
Each hikes has a state like "Incription, Effectuée, Prête". Our Team choose to put color on name to make them more user friendly.


![tags](https://raw.githubusercontent.com/CPNV-ES/hixe/feature/graphic_charter/docs/technical/graphic_charter/img/Tags.PNG)

```html
<span class="badge badge-secondary">Préparation</span>
<span class="badge badge-info">Inscription</span>
<span class="badge badge-success">Prête</span>
<span class="badge badge-primary">En cours</span>
<span class="badge badge-danger">Annulée</span>
<span class="badge badge-dark">Effectuée</span>
```

You can read more about tags [here](https://getbootstrap.com/docs/4.0/components/badge/).

# Alert
This project also uses popup-message :
![popup](https://raw.githubusercontent.com/CPNV-ES/hixe/feature/graphic_charter/docs/technical/graphic_charter/img/popup.PNG)

A specific message needs to be implemented with this [way](https://github.com/CPNV-ES/hixe/blob/develop/docs/technical/popup-message.md), please follow it correctly !



