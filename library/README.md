# Директории library

Директория предназначена для хранения библиотек

## internal
Библиотеки написанные под этот проект

```
library\internal\projectName\ProjectName.php
```

## external
Внешние библиотеки установленные пользователем вручную

```
library\external\vendorName\ClassName.php
```

## composer
Библиотеки загруженные через композер

## extension
Расширения для различных библиотек.

Рекомендуется добавлять слово Extension в конце имени файла.

Например вы хотите раширить класс arhone\cache\CacheFile

Для этого создайте файл

```
library\extension\arhone\cache\CacheFileExtension.php
```

Он будет доступен для вызова так:

```php
new arhone\cache\CacheFileExtension();
```

После этого его можно описать в настройка билдера:

```
'CacheFileExtension' => [
    'class' => 'arhone\cache\CacheFileExtension'
]
```

и при желании поменять родной Cache на CacheFileExtension:

```
'Cache' => ['CacheFileExtension']
```
