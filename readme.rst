###################
Aide 
###################
# à propos de ce fichier
il est créer en markdown (regarde sur le net) 

# Ce codeigniter à
- twig 2.0 d'installer
- les langues
- le fichier config de configuré pour
    - langues
    - composer
    - database est désactivé dans les librairies (pas besoin en json)
    - j'ai laissé les paramètres que j'ai modifiés
        exemple $config['composer']...
                $config['composer']... ma modif 
- modification de index.php
    - déplacement de view
    - installation du template pour le forum dans 3 fichiers twigs

# La structure du site
- on a des forums (thème: agriculture, argent....)
- dans chaque forum on a des discussions (par exemple dans agriculture, comment éléver une vache? ...)
- quand on clique sur une discussion on a une page avec la discussion qui apparait


# à faire
..- modifier route pour mettre forum comme constroller de base
- mettre bootstrap et jquery dans le fichier discussion.twig
- créer sur cette base la page theme.twig (elle affiche la liste de thèmes, et la série de discussions possible, je te laisse t'amuser avec bootstrap)
..- créer une route discussion qui nous emmène via un controller discussion sur discussion.twig
..- créer une route forums qui nous emmène via un controller forum sur forum.twig