<?php
/**
 * @link https://framework.iziweb.net
 * @copyright Copyright (c) 2021 Izi Software LLC
 * @license https://framework.iziweb.net/license
 */

namespace app\controllers;

use izi\base\Application;
use izi\base\Request;
use izi\base\Response;
use app\models\ContactForm;

/**
 * Class SiteController
 *
 * @package app\controllers
 * @author Giang A Tin <vantruong1898@gmail.com>
 * @since 1.0
 */
class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'Giang A tin',
        ];
        return $this->render('home', $params);
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        $errors = [];
        if($request->isPost()){
            $contact->loadData($request->getBody());
            if($contact->validate() && $contact->send()){
                Application::$app->session->setFlash('success', 'Thank for contacted us!');
                $response->redirect('/contact');
            }
        }

        return $this->render('contact', [
            'errors' => $errors,
            'model' => $contact
        ]);
    }


}