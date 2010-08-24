# Installation #

1) Download and install git
    On linux :  `$ sudo aptitude install git`
    On Windows download : `http://code.google.com/p/msysgit/`

2) Download the Bug Quest Tracker, use 
    `$ git clone git://github.com/Mystick/Bug-Quest-Tracker.git`

3) Rename and edit file in config directory, delete -dist in name ;)
    so databases.yml-dist became databases.yml

4) Configure you Vhosts, Follow this procedure : [symfony](http://www.symfony-project.org/jobeet/1_4/Doctrine/en/01).

5) Finish Installation
  `$ php symfony doctrine:build --all` 
  `$ php symfony doctrine:data-load data/fixtures/fixtures.yml` (for generate a default user and permission (User: admin password : admin)
  `$ php symfony doctrine:data-load data/fixtures/data.yml` (For create a default value quest)
  `$ php symfony cc`

Special thanks for Pocky and Symfony Framework :)

Matthieu 'Mystick' Derasse
