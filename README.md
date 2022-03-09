# Lumen test task

## Установка

### 1. Варианты загрузки на выбор:

- С помощью git clone:

  ```bash
  git clone https://github.com/killyouare/Lumentt.git
  ```

- Загрузить zip-архив с github. После загрузки распаковать в текущую директорию.

### 2. Настройка

```bash
cd lumentt/deploy/
sudo docker-compose up -d --build
```

Ожидаем окончания запуска контейнеров

```bash
sudo docker exec php-fpm php artisan migrate:refresh
sudo docker exec php-fpm php artisan db:seed
```

Сервер доступен по адресу:

http://localhost:80

Для доступа к [adminer](http://localhost:63/):

|     Атрибут      | Вводимые данные |
| :--------------: | :-------------: |
|      Движок      |   PostgreSQL    |
|      Сервер      |       db        |
| Имя пользователя |      admin      |
|      Пароль      |      admin      |
|   База данных    |      lumen      |

Тестирование в postman:

- Создать новое окружение и выбрать его.
- Обозначить host как http://localhost:80/api
- После регистрации админа поставить ему в бд is_admin = 1.
- Проходить по дереву запросов строго сверху вниз.

## Примечания

- Для установки вам необходимы:

  - [git](https://github.com/git-guides/install-git)
  - [docker](https://docs.docker.com/engine/install/)

- Если при php artisan migrate вылезла подобная ошибка:

  ```bash
  In Connection.php line 712:

  SQLSTATE[08006] [7] could not connect to server: Connection refused
  	Is the server running on host "db" (172.18.0.2) and accepting
  	TCP/IP connections on port 5432? (SQL: select * from information_schema.ta
    bles where table_schema = public and table_name = migrations and table_type
    = 'BASE TABLE')

  In Connector.php line 70:

  SQLSTATE[08006] [7] could not connect to server: Connection refused
    Is the server running on host "db" (172.18.0.2) and accepting
    TCP/IP connections on port 5432?
  ```

  Подождите ~ 20сек и повторите попытку
