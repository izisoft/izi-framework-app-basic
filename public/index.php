<?php
/**
 * @link https://framework.iziweb.net
 * @copyright Copyright (c) 2021 Izi Software LLC
 * @license https://framework.iziweb.net/license
 */

/**
 * @author Giàng A Tỉn <vantruong1898@gmail.com>
 * @since 1.0
 */
use app\controllers\AuthController;
use app\controllers\SiteController;
use izi\web\Application;
use \app\models\User;

@ini_set('display_startup_errors',1);
@ini_set('display_errors',1);

$rootPath = dirname(__DIR__);
require_once $rootPath . '/vendor/autoload.php';
require_once $rootPath . '/vendor/izisoft/izi-framework/Izi.php';
require_once $rootPath . '/app/helpers/help.php';
//require __DIR__ . '/../../common/config/bootstrap.php';
require $rootPath . '/app/config/bootstrap.php';

$dotenv = Dotenv\Dotenv::createImmutable($rootPath);
$dotenv->load();

//$config = izi\helpers\ArrayHelper::merge(
//    require $rootPath . '/../../common/config/main.php',
//    require __DIR__ . '/../../common/config/main-local.php',
$config =  require $rootPath . '/app/config/main.php';
//    require __DIR__ . '/../config/main-local.php'
//);



//$config = [
//    'user' => [
//        'class' => User::class
//    ],
//    'db' => [
//      'dsn' => $_ENV['DB_DSN'],
//      'user' => $_ENV['DB_USER'],
//      'password' => $_ENV['DB_PASSWORD'],
//]
//];

//$config['rootPath'] = $rootPath;

$app = new Application($config);

\izi\base\Event::on(Application::EVENT_BEFORE_REQUEST,Application::EVENT_BEFORE_REQUEST, function (){
    echo "Before request";
});

$app->on(Application::EVENT_BEFORE_REQUEST, function (){
    echo "Before request 22";
});


$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/contact', [SiteController::class, 'contact']);

$app->router->post('/contact', [SiteController::class, 'contact']);

$app->router->get('/login', [AuthController::class, 'login']);

$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);

$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/profile', [AuthController::class, 'profile']);

$app->run();