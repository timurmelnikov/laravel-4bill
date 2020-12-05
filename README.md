# Тестовое задание 4bill

## Задание

1. Установить Laravel 8
2. Настроить login/register (composer require laravel/ui:^2.4 & php artisan ui
   bootstrap --auth) (Поля при регистрации - name, login, phone, email,
   date_of_birth, about)
3. Создать 2 типа пользователей «Admin» & «User»
4. Регистрация по умолчанию тип «User»
5. Создать личный ĸабинет (ЛК) для пользователей (Bootstrap 3)

User - после авторизации перевести в ЛК и вывести общее данные
Admin - после авторизации перевести в ЛК и вывести всех User по 3 на
странице (есть возможность удалить User-a)
User ĸоторый был удален, видит сообщение «Этот пользователь был
заблоĸирован!»

## Развертывание проекта

```
composer install
npm install
npm run dev
php artisan migrate:fresh --seed
```

Аккаунт для входа:
Login: root
Password: 11111111
