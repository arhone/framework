# Arhone Framework
Стартовый набор для развертывания веб проекта на (PHP 7)

### Установка

```bash
cd /srv
composer create-project arhone/framework project
```

##### Настройка веб сервера 

Добавьте в контекст http в nginx.conf следующую строчку на вашей машине для разработки проекта
```
include /srv/*/config/nginx/develop.conf;
```
или на боевом сервере
```
include /srv/*/current/config/nginx/production.conf;
```

##### Помощь

* [Toster](https://toster.ru/search?q=arhone)
* [Stack Overflow](https://ru.stackoverflow.com/questions/tagged/arhone)