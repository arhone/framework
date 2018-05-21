# Arhone Framework
Стартовый набор для разработка приложений на (PHP 7)

### Установка

Шаг первый. Получить необходимые файлы.

```bash
cd /srv
composer create-project arhone/framework project
```

Или скачайте и распакуйте архив самостоятельно, после чего выполните

```bash
mkdir /srv/project
cd /srv/project
composer install
```

##### Настройка веб сервера 
Шаг второй. Настроить веб сервер

Настройте виртуальный хост своего веб сервера как, что бы его корневой директорией была /srv/project/web
Если у вас nginx, подключите /srv/project/config/nginx/develop.conf в качестве настройки сервера.

##### Помощь

* [Toster](https://toster.ru/search?q=arhone)
* [Stack Overflow](https://ru.stackoverflow.com/questions/tagged/arhone)