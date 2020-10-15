# STI - Project 1 - Manuel

@authors: Cuénoud Robin, Mülhauser Florian

 

### Fichiers

Le répertoire "site" contient deux répertoires :

    - databases
    - html

Le répertoire "databases" contient :

    - database.sqlite : un fichier de base de données SQLite
    - deploy_db.sql: un script de commandes SQL pour créer une nouvelle DB de base, et pouvoir automatiser certaines choses 

Le répertoire "html" contient différents dossiers :

    - fragments: qui contients les fichier pour le CSS (header.php, footer.php) et les filtres(adminFilter.php, loginFilter.php). TODO DBHandler
    - message: qui regroupe les fichier php pour créer, supprimer, afficher en détails et répondre aux messages (respectivement: create.php, delete.php, details.php, reply.php)
    - user: qui regroupe les fichiers relatifs à la table user de la DB. Il y a donc: 
    		- changePassword.php: pour modifier le mot de passe de son compte
    		- deleteUser.php: pour supprimer un utilisateur en renseignant son username
    		- modifyUser.php: pour modifier (mot de passe, validité, ou role) d'un utilisateur, en renseignant sont username.
    		- register.php: pour créer un nouvel utilisateur et rentrer ses attributs

En plus de cela, le répertoire "html" contient différents fichier pour certaines pages/fonctions principales:

```
- home.php:
- inbox.php: La page qui montre les messages dans notre boite aux lettres, et qui nous laisse intéragir avec graces aux boutons
- login.php: la page pour se login, on y est redirigé de base
- logout.php: le bouton de logout fait executer se code et nous déconnecte de notre session
- phpliteadmin.php: page de gestion de la DB par navigateur
```

Le mot de passe pour phpliteadmin est "admin".



### Comment lancer l'application ?

* télécharger l'archive du repo sur github
* extraire l'archive
* executer le script en faisant `./deploy.sh`: cela va créer les docker pour lancer les services nginx et php (ça éteint et supprime le docker précédant s'il tournait déjà)
* ouvrir un navigateur et aller sur `http://localhost:8080/login.php` ou n'importe quel autre page, elles devraient vous rediriger ici.
* Voilà, le tour est joué !





Pour changer le database de base de l'infra (pas nécessaire car une database pré remplie est déjà présente dans le package. Mais en cas de modification ou pour injecter des requetes SQL) : 

* executer le script `deploy.sh` 

* executer `docker exec -it sti_project "/bin/bash"`

* executer ensuite dedans : `cd usr/share/nginx/databases` 

* executer ensuite : `echo ".read deploy_db.sql" | sqlite3 database.sqlite ` 

  Les requêtes du fichier deploy_db.sql seront insérées dans notre database.





