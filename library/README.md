# Директории library

## composer
Библиотеки загруженные через композер

## custom
Библиотеки установленные пользователем вручную

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
'CacheExtension' => [
    'class' => 'arhone\cache\CacheFileExtension'
]
```

и при желании поменять родной Cache на CacheExtension:

```
'Cache' => ['CacheExtension']
```

#### Расширение библиотек модулей

Например вы хотите раширить класс

```
hello_world\controller\HelloWorldController
```

который находиться по адресу

```
web/module/hello_world/source/controller/HelloWorldController.php
```

Для этого вы можете создать файл

```
library/extension/hello_world/controller/HelloWorldControllerExtension.php
```

И создать класс HelloWorldControllerExtension в пространстве имён

```
hello_world\controller
```

После этого описать настройки билдера в модуле hello_word:

```
'HelloWorldControllerExtension' => [
    'class' => 'hello_world\controller\HelloWorldControllerExtension',
]
```

и при желании поменять HelloWorldController на HelloWorldControllerExtension:

```
'HelloWorldController' => ['HelloWorldControllerExtension']
```

#### source в директории модуля

Так же рекомендуется все исходные классы модуля размещать в директории module_name/source

Это сделано по двум простым причинам:

1) Вы не раздувате директорию модуля и не перемашиваете ваши библиотеки с другими директориями вроде config и template
2) Иногда разработчики модуля сами предоставляют расширения своих классов, создавая директорию test или extension рядом c source в папке модуля.
Таким образом сохраняется целостность модуля и появляется возможность переключения версий (исходная / расширенная / тестовая).

source - Для исходных классов модуль

library - Для сторонних библиотек или собственных библитек разработчика модуля

extension - Для расширений классов модуль

test - Для тестовых классов модуля