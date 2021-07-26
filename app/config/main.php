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

use app\models\User;

$db = require __DIR__ . '/database.php';
return [
    'id' => 'IZI-APP-FRAMEWORK-BASIC',
    'basePath' => '',
    'components' => array_merge($db ,[
        'user' => [
            'class' => User::class
        ],
    ])
];

