<?php

use Phinx\Wrapper\TextWrapper;

require __DIR__ . '/../vendor/autoload.php';

$app = \Ethancpp\Documentor\Core\App::getInstance();
$app->boot();

/**
 * TODO move this somewhere BETTER.
 * 
 * This is just an example on migrating/rolling back programmatically.
 */
if (isset($_GET['phinx'])) {
    $command = $_GET['phinx'];

    $phinx = require __DIR__ . '/../vendor/robmorgan/phinx/app/phinx.php';
    $wrap = new TextWrapper($phinx);
    $wrap->setOption('configuration', __DIR__ . '/../phinx.php');

    if ($command == 'migrate') {
        $output = call_user_func([$wrap, 'getMigrate']);
    } elseif ($command == 'rollback') {
        $output = call_user_func([$wrap, 'getRollback']);
    }

    var_dump($output);
    die;
}