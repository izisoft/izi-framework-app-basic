<?php
/**
 * @link https://framework.iziweb.net
 * @copyright Copyright (c) 2021 Izi Software LLC
 * @license https://framework.iziweb.net/license
 */

namespace app\controllers;
use Izi;

use izi\middlewares\AuthMiddleware;
use izi\base\Request;
use izi\base\Response;
use app\models\LoginForm;
use app\models\User;


/**
 * Class AuthController
 *
 * @package app\controllers
 * @author Giang A Tin <vantruong1898@gmail.com>
 * @since 1.0
 */
class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $errors = [];
        $loginForm = new LoginForm();

        if($request->isPost()){
            $loginForm->loadData($request->getBody());

            if($loginForm->validate() && $loginForm->login()){
                $response->redirect('/');
            }
        }

        return $this->render('login', [
            'errors' => $errors,
            'model' => $loginForm
        ]);
    }

    /**
     * @param Request $request
     * @return array|false|string|string[]
     */
    public function register(Request $request, Response $response)
    {
        $this->setLayout('auth');

        $errors = [];
        $user = new User();
        if($request->isPost()){

            $user->loadData($request->getBody());

            if($user->validate() && $user->save()){
                Izi::$app->session->setFlash('success', 'Thank for register!');
                $response->redirect('/');
                exit;
            }
        }
        return $this->render('register', [
            'errors' => $errors,
            'model' => $user
        ]);
    }


    public function logout(Request $request, Response $response)
    {
        $this->setLayout('auth');
        Izi::$app->logout();
        $response->redirect('/');
        exit;
    }

    public function profile()
    {
//        Application::$app
        return $this->render('profile');
    }

}