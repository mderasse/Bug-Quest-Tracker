# A propos #

La première chose à dire à propos de ce CMS, c'est qu'il n'est pas forcément le CMS le mieux codé de la terre.

Maintenant que c'est dit, passons à la suite.

Peanut est un CMS basé sur symfony (branche 1.4.x pour le moment), ce CMS est mon CMS labo/expérience me permettant tout simplement d'apprendre les langages web. Les différents éléments sont donc perfectibles et le seront continuellement.

N'hésitez pas à faire un fork, reprendre le code, l'améliorer et me faire des dizaines de retours parce que je n'ai pas forcément fait les choses correctement. Je vous en remercierait du fond de mon petit coeur de développeur.

Enfin, peanut est livré en l'état, sans garantie de fonctionnement et/ou de fiabilité. Cela ne m'empêche cependant pas de faire de mon mieux pour ne pas livrer quelque chose d'inutilisable.

Toute l'histoire est à suivre sur [mon blog](http://dev.pockyworld.com).


# Installation #

La procédure d'installation est relativement simple mais ne se fait pas par magie :). Le projet vous permet à travers le fichier .gitignore de ne pas synchroniser des fichiers dits "sensibles" ou inutiles. Des [submodules git](http://book.git-scm.com/5_submodules.html) sont également utilisés afin de pouvoir être synchronisés avec différents plugins symfony par exemple.

Voici les différentes étapes :

1. Créer le dossier peanut
Aller (via le terminal) dans votre répertoire de travail "web" et exécuter la commande suivante : `$ git clone git://github.com/pocky/peanut.git`

2. Synchroniser les submodules

`$ git submodule init` 
`$ git submodule update`

3. Renommer les fichiers *-dist
Les fichiers de configurations les plus importants sont livrés "bruts". Il vous faudra donc pour utiliser correctement le projet sur votre machine renommer les fichiers *-dist en supprimant le -dist. La liste des fichiers est la suivantes :
  ./apps/backend/config/factories.yml  
  ./apps/frontend/config/factories.yml  
  ./config/databases.yml  
  ./config/properties.ini  
 
4. Configurer vos vhosts
Se référer à la procédure [symfony](http://www.symfony-project.org/jobeet/1_4/Doctrine/fr/01#chapter_01_configuration_du_serveur_web_la_methode_securisee).

5. Finalisation de l'installation

  `$ php symfony doctrine:build --all --and-load` 
  `$ php symfony cc`


Alexandre
