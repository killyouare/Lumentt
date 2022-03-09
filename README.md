#Lumen test task 
***

##Установка
***
```bash
git clone https://github.com/killyouare/Lumentt.git
cd lumentt/deploy/
sudo docker-compose up -d --build
```
Ожидаем окончания запуска контейнеров
```bash
sudo docker exec php-fpm php artisan migrate:refresh
sudo docker exec php-fpm php artisan db:seed
```
Для доступа к adminer:

http://localhost:63

* System - PostgreSQL
* Server - db
* Username - admin
* Password - admin
* Database - lumen
    
##Примечания
***
Рекомендуем, при добавлении админа через постман, проставить ему в бд is_admin = 1, в ином случае, половина функий не отработают 

Для установки вам понадобится: 
 * [git](https://github.com/git-guides/install-git)
 * [docker](https://docs.docker.com/engine/install/)
 
