<?php
/**
 * @link https://framework.iziweb.net
 * @copyright Copyright (c) 2021 Izi Software LLC
 * @license https://framework.iziweb.net/license
 */
/**
 * @author Giang A Tin <vantruong1898@gmail.com>
 * @since 1.0
 */

$db = [];
if (file_exists($fp = __DIR__ . '/database.local.php')) {
    $db = require $fp;
}
return array_merge([
    'db' => [
        'class' => 'izi\\db\\Connection',
        'dsn' => $_ENV['DB_DSN'],
        'username' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
        'charset' => 'utf8',
    ],
    // pgsql connection
    'pgs' => [
        'class' => 'izi\\db\\Connection',
        'dsn' => 'pgsql:host=localhost;port=5432;dbname=database_izinet',
        'username' => 'database_izinet',
        // 'schema'   => 'public',
        'password' => 'secret',
        'charset' => 'utf8',
    ],

    // elasticsearch connection
    // 'els' => [
    //         'class' => 'yii\elasticsearch\Connection',
    //         'nodes' => [
    //                 ['http_address' => '127.0.0.1:9200'],
    //                 // configure more hosts if you have a cluster
    //         ],
    // ],

    // mongodb connection
    // 'mdb' => [
    //         'class' => 'yii\\db\\Connection',
    //         'dsn' => 'mysql:host=localhost;dbname=database_izinet',
    //         'username' => 'database_izinet',
    //         'password' => 'secret',
    //         'charset' => 'utf8',
    // ],

    // sqlite
    'dbs' => [
        'class' => 'yii\db\Connection',
        'dsn' => 'sqlite:' . dirname(__DIR__) . '/runtime/sqlite/sqlite.db',
        'charset' => 'utf8',
    ],
], $db);


