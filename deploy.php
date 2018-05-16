<?php
namespace Deployer;

require 'recipe/common.php';

set('git_tty', true); // [Optional] Allocate tty for git clone. Default value is false.
set('application', 'project');// Название проекта
set('repository', 'git@github.com:arhone/example.git');// Репозиторий проекта
set('branch', 'master'); // Ветка
set('keep_releases', 5); // Количество релизов, которые будет храниться в архиве
set('shared_files', []); // Общие файлы проекта
set('shared_dirs', [
    'log'
]);  // Общие папки проекта
set('writable_dirs', []); // Папки, в которые приложение должно иметь возможность писать данные
set('allow_anonymous_stats', false);

# Настройки серверов
host('project.ru')
    ->stage('production') // Тип сервера
    ->user('username') // Пользователь
    ->port(22)    // ssh порт
    ->set('deploy_path', '/srv/project') // Директория проекта
    ->identityFile('~/.ssh/id_rsa') // ssh ключ
    ->forwardAgent(true)
    ->multiplexing(true);

# Задачи
task('composer:install', function() {
    run('cd {{release_path}} && {{bin/composer}} {{composer_options}}');
}); // Установить пакеты

task('reload:php-fpm', function() {
    run('sudo /usr/sbin/service php7.1-fpm restart');
}); // Перезапустить PHP

task('reload:nginx', function() {
    run('sudo openresty -s reload');
}); // Перезапустить nginx

task('notify:success', function() {
    run('cd {{release_path}} && wget "https://api.telegram.org/bot:Token/sendMessage?chat_id=-254413760&text={{application}}: {{target}}; %0A deploy {{branch}}: success; %0A @{{user}}: " --quiet -O -');
}); // Оповещение об успешном деплое

task('notify:failed', function() {
    run('cd {{release_path}} && wget "https://api.telegram.org/bot448106603:Token/sendMessage?chat_id=-254413760&text={{application}}: {{target}}; %0A deploy {{branch}}: failed; %0A @{{user}}: "$(git log -1 --pretty=%B)" --quiet -O -');
}); // Оповещение об ошибке деплоя

// Деплой
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code', // Скачать последний код с репозитория
    'deploy:shared',      // Создать ссылки на общие данные
    'deploy:writable',
    //'deploy:vendors',   // Обновить компоненты композера
    'composer:install',   // Обновить компоненты композера
    'deploy:clear_paths',
    'deploy:symlink',     // Создать ссылку текущего релиза на этот
    'deploy:unlock',
    'cleanup',            // Удалить старые релизы
    'success'
])->desc('Deploy your project');

after('deploy:failed', 'deploy:unlock'); // [Optional] If deploy fails automatically unlock.
after('deploy', 'reload:php-fpm');       // После деплоя перезапустим php
after('deploy', 'reload:nginx');         // После деплоя перезапустим nginx
after('success', 'notify:success');      //  Оповещение об успешном деплое
after('deploy:failed', 'notify:failed'); // Оповещение ошибке деплоя

// Откат
after('rollback', 'reload:php-fpm'); // После отката перезапустим php
after('rollback', 'reload:nginx');   // После деплоя перезапустим nginx