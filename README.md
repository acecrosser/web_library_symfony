## Тестовое задание "WEB приложение "Библиотека"
---
Для быстрого запуска на локальной машине, требуется чтоб было установленно:

* PHP 7.4
* Composer
* MySQL

Для начала, создаем любую папку на локальном ПК:

`mkdir name_dir`


Переходим в папку:

`cd name_dir`


Через git делаем клонирование репозитория:

`git clone https://github.com/acecrosser/web_library_symfony.git`


Переходим в папку проекта:

`cd web_library_symfony`

Устанавливаем все зависимости через Composer:

`composer install`


После установки, требуется прописать ваши данные для подключени к БД в файле .env:

``DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name``


Далее осуществить миграцию данных:

`symfony console make:migration`

*Если при создании миграции, выйдет ошибка, что БД не существует, то требуется создать ее вручну в MySQL и повторить операцию миграции*


Применить миграцию:

`symfony console doctrine:migrations:migrate`


Запустить сервер:

`symfony server:start`


Перейти в браузер по адресу:

http://127.0.0.1:8000/