# STI - Project 1 - Manuel

@authors: Cuénoud Robin, Mülhauser Florian

 

### Comment lancer l'application ?

* télécharger l'archive du repo sur github
* extraire l'archive
* avoir docker
* exécuter le script qui est à la racine en faisant `./deploy.sh` dans un terminal: cela va créer le docker pour lancer les services nginx et php (ça éteint et supprime le docker précédant s'il tournait déjà avant de le relancer)
* ouvrir un navigateur et aller sur `http://localhost:8080/login.php` ou n'importe quel autre page, elles devraient vous rediriger ici.
* Voilà, le tour est joué !

* Il est sûrement nécessaire d'attribuer les droits d'écriture sur le dossier `site/databases/` ainsi que `site/databases/database.sqlite`  (dans le doute un petit `chmod 777` ;) ). Ceci arrive car le dossier est un dossier partagé donc il appartient à l'OS hôte et non pas au docker. 



Pour changer le database de base de l'infra (pas nécessaire car une database pré remplie est déjà présente dans le package. Mais en cas de modification ou pour injecter des requêtes SQL vous pouvez faire : 

* exécuter le script `deploy.sh` 

* exécuter `docker exec -it sti_project "/bin/bash"`

* exécuter ensuite dedans : `cd usr/share/nginx/databases` 

* exécuter ensuite : `echo ".read deploy_db.sql" | sqlite3 database.sqlite ` 

  Les requêtes du fichier deploy_db.sql seront insérées dans notre database.



### Divers login existants

SCREENSHOT de la table user de la DB

* un utilisateur avec le rôle administrateur (admin/admin)
* un utilisateur, collaborateur standard (user/user)
* un utilisateur collaborateur inactif (inactive user/inactive user)

Le mot de passe pour phpliteadmin est "admin".



### Description des fichiers

Le répertoire "site" contient deux répertoires :

    - databases
    - html

Le répertoire "databases" contient :

    - database.sqlite : un fichier de base de données SQLite
    - deploy_db.sql: un script de commandes SQL pour créer une nouvelle DB de base, et pouvoir automatiser certaines choses 

Le répertoire "html" contient différents dossiers :

    - filters: qui contient les filtres d'autorisation (login requis ou administrateur requis). Avec les fichiers loginFilter.php, adminFilter.php.
    - fragments: qui contients les fichier pour le CSS (header.php, footer.php, et le logo  broken_lock.svg ).
    - handlers: Qui contient les fichier handler qu'on importe. C'est dans le fichier DBHandler.php qu'on a la classe DBHandler, qui permet de faciliter les connexions et requêtes à la DB dans les autres pages. Elle se construit/connecte et se détruit toute seule, et on a des méthode pour faire des requetes SQL(query, exec, prepare).
    - message: qui regroupe les fichier php pour créer, supprimer, afficher en détails et répondre aux messages (respectivement: create.php, delete.php, details.php, reply.php)
    - user: qui regroupe les fichiers relatifs à la table user de la DB. Il y a donc: 
    		- changePassword.php: pour modifier le mot de passe de son compte
    		- deleteUser.php: pour supprimer un utilisateur en renseignant son username
    		- modifyUser.php: pour modifier (mot de passe, validité, ou role) d'un utilisateur, en renseignant sont username.
    		- register.php: pour créer un nouvel utilisateur et rentrer ses attributs

En plus de cela, le répertoire "html" contient différents fichier pour certaines pages/fonctions principales:

```
- home.php: page d'acceuil. pas très utile en soit, contient les liens des autres pages.
- inbox.php: La page qui montre les messages dans notre boite aux lettres, et qui nous laisse intéragir avec graces aux boutons
- login.php: la page pour se login, on y est redirigé de base
- logout.php: le bouton de logout fait executer se code et nous déconnecte de notre session
- phpliteadmin.php: page de gestion de la DB par navigateur
```

Le mot de passe pour phpliteadmin est "admin".



### Renseignements sur l'utilisation de certaines pages

Il n'y a pas de description supplémentaire pour toutes les pages. Elles sont toutes expliqués sur le site et certaine sont très straight-forward.

#### 1) Inbox

Ici apparait la liste de nos messages. Nous avons sur chacun 3 boutons (de gauche a droite):

* un pour répondre à l'auteur de ce message (un "Re:" sera ajouté a l'objet)
* un pour afficher en détail le message
* un pour supprimer un message 

#### 2) ModifyUser

Une fois authentifié avec un compte "administrateur", vous pouvez accéder à la page modifyUser en cliquant sur un lien "Modify a User", ou à adresse `http://localhost:8080/modifyUser.php`. Si vous n'êtes pas administrateurs, vous ne serez simplement pas redirigé en dehors de votre page actuelle.

* entrez le username de l'utilisateur que vous voulez modifier
* appuyez sur le bouton `find the user`

S'il existe bien dans la DB, les champs de Password, Activity et Role vont être affichés et pré-remplis avec les valeurs actuelles. Modifiez les à votre convenance et appuyer sur le bouton `Save changes`. 
