# Arhone Framework
Стартовый набор для разработка приложений на (PHP 7)

### Установка

Шаг первый. Получить необходимые файлы.

```bash
cd /var/www;
composer create-project arhone/framework framework
```

Или скачайте и распакуйте архив самостоятельно, после чего выполните

```bash
cd /var/www/framework;
composer install
```

##### Настройка веб сервера 
Шаг второй. Настроить веб сервер

Настройте виртуальный хост своего веб сервера как, что бы его корневой директорией была /var/www/framework/web
Если у вас nginx, подключите /var/www/framework/config/nginx.conf в качестве настройки,
в Ubuntu например это делается примерно так:
```bash
ln -s /var/www/framework/config/nginx.conf /etc/nginx/sites-enabled/framework.conf
``` 

##### Помощь

* [Toster](https://toster.ru/search?q=arhone)
* [Stack Overflow](https://ru.stackoverflow.com/questions/tagged/arhone)