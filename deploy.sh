docker kill sti_project
docker rm sti_project
docker rm $(docker ps -a -q)
# we put the forward / int front of $PWD/site to make it work on WSL.
docker run -ti -v "/$PWD/site":/usr/share/nginx/ -d -p 8080:80 --name sti_project --hostname sti arubinst/sti:project2018

docker exec -u root sti_project service nginx start
docker exec -u root sti_project service php5-fpm start

#since db is shared between container and user we need to chmod it to be able to write on it :/
sudo chmod 777 $PWD/site/databases
sudo chmod 777 $PWD/site/databases/database.sqlite
