Si vous utilisez l'image Docker proposée pour le cours, vous pouvez copier directement le repertoire "site" et son contenu (explications dans la donnée du projet).

Le repertoire "site" contient deux repertoires :

    - databases
    - html

Le repertoire "databases" contient :

    - database.sqlite : un fichier de base de données SQLite

Le repertoire "html" contient :

    - exemple.php : un fichier php qui réalise des opérations basiques SQLite sur le fichier contenu dans le repertoire databases
    - helloworld.php : un simple fichier hello world pour vous assurer que votre container Docker fonctionne correctement
    - phpliteadmin.php : une interface d'administration pour la base de données SQLite qui se trouve dans le repertoire databases

Le mot de passe pour phpliteadmin est "admin".


Pour deployer l'infra : 
executer le script `deploy.sh` 

executer `docker exec -it sti_project "/bin/bash"`

executer ensuite dedans : `cd usr/share/nginx/databases` 

executer ensuite : `echo ".read deploy_db.sql" | sqlite3 database.sqlite ` 





