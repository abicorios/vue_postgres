# vue_postgres
Прототип отображения данных из базы `PostgreSQL` через `Vue`. Бэкенд на `PHP`, сервер `Apache2`. Сайт проверен на OpenServer и на Ubuntu 18.04.
# Использование
Настройки сервера `Ubuntu` проще выполняются если залогиниться как `root`:
```
sudo -i
```
Установка `PostgreSQL`, `PHP`, `Apache2` на `Ubuntu` сервере:
```
apt update
apt install postgresql php php-pgsql apache2
```
Консольное управление базой:
```
sudo -u postgres psql
```
Создание тестовой базы и пользователя:
```
create database test;
create user test with encrypted password 'test';
grant all privileges on database test to test;
```
Выход из базы:
```
\q
```
Очистка умолчательной папки сайта:
```
cd /var/www/html
rm index.html
```
Получение файлов сайта:
```
git clone https://github.com/abicorios/vue_postgres .
```
Выполнение миграции:
```
psql -h 127.0.0.1 -d test -U test -f migration/messages.sql
```
Теперь можно открыть сайт введя IP сервера в строку браузера. Должна появится строка ввода id. В базе есть id от 1 до 3, и соотествующие сообщения.
