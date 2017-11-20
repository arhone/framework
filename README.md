# Framework
Стартовый набор для разработка приложений на PHP 7.

### Установка

##### Установка фреймворка 
Шаг первый. Получить необходимые файлы.


```bash
cd /var/www;
composer create-project arhone/framework project_name
```

Или скачайте и распакуйте архив самостоятельно, после чего выполните

```bash
cd /var/www/project_name;
composer install
```

##### Настройка веб сервера 
Шаг второй. Настроить веб сервер

Настройте виртуальный хост своего веб сервера как, что бы его корневой директорией была /var/www/project_name/web
Если у вас nginx, подключите /var/www/project_name/config/nginx.conf в качестве настройки,
в Ubuntu например это делается примерно так:
```bash
ln -s /var/www/project_name/config/nginx.conf /etc/nginx/sites-enabled/project_name.conf
``` 
  