# Gestion des champs dates sur le client

Les champs dates sont géré par la librairie `bootstrap-datetimepicker`. 
Il a été choisi d'utiliser une librairie plûtot que les champs HTML de base "date", "datetime-local" car ceux-ci ne sont pas 
implémenter de la même façon sur tout les navigateurs.

La documentation pour cette librairie se trouve ici : https://getdatepicker.com/4/Functions/#viewdate

Les dates sont envoyés au serveur sous la forme d'un timestamp PHP.