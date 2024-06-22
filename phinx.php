<?php

use Dotenv\Dotenv;

$env = Dotenv::createImmutable(__DIR__);
$env->load();

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/src/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/src/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'development' => [
            'adapter' => $_ENV['DB_ADAPTER'] ?? 'mysql',
            'host' => $_ENV['DB_HOST'] ?? 'localhost',
            'name' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'] ?? 'root',
            'pass' => $_ENV['DB_PASS'] ?? '',
            'port' => $_ENV['DB_PORT'] ?? '3306',
            'charset' => 'utf8',
            'table_prefix' => $_ENV['TABLE_PREFIX'] ?? '',
        ],
    ],
    'version_order' => 'creation',
];
