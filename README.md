<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
###### Задача:

>Разработать REST API для записной книжки c эндпоинтами:

```
1.1. GET /api/v1/notebook/
1.2. POST /api/v1/notebook/
1.3. GET /api/v1/notebook/<id>/
1.4. POST /api/v1/notebook/<id>/
1.5. DELETE /api/v1/notebook/<id>/
```

>Добавить возможность постраничного вывода записей,
>Добавить Swagger для отображения эндпоинтов
>Дополнительно: Сделать запуск приложения из Docker-контейнера
###### Стек:

- Laravel 11.0
- MySQL 8.0.32
- PHP 8.3.7
- Docker

###### Установка проекта

1. Клонируем репозиторий

```bash
git clone https://github.com/KonstantinKliman/test-task-notebook-api.git
```

2. Переходим в директорию с проектом

```bash
cd test-task-notebook-api
```

3. Устанавливаем зависимости

```bash
composer install
```

4. Делаем копию .`.env.example` и переименовываем в `.env`

5. Запускаем приложение

```bash
./vendor/bin/sail up -d
```

- Примечание:

Для того, чтобы каждый раз не писать в консоли `./vendor/bin/sail up -d` можно добавить алиасы

```bash
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```

Потом можно поднимать контейнеры через команду:

```bash
sail up -d
```

6. Переходим на `http://localhost/api/documentation` , где описана документация API
###### Тестирование приложения

Данное приложение я тестировал через Postman

[Ссылка на коллекцию](https://www.postman.com/altimetry-astronaut-57754230/workspace/notebook-api/collection/27056206-8cd357d7-6e26-4e9e-98f7-3ad2572764a9?action=share&creator=27056206)
