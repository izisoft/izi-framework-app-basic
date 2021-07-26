<?php
/**
 * @link https://framework.iziweb.net
 * @copyright Copyright (c) 2021 Izi Software LLC
 * @license https://framework.iziweb.net/license
 */

namespace app\controllers;

use app\events\ContactEvent;
use Izi;
use izi\web\Request;
use izi\web\Response;
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
//    const EVENT_CONTACT = 'contact';

    public function home()
    {
        $params = [
            'name' => 'Giang A tin',
        ];
        return $this->render('home', $params);
    }

    public function contact(Request $request, Response $response)
    {
//        $event = new ContactEvent();
//        $event->message = 'ABC';
//
//        $this->on(self::EVENT_CONTACT, 'testEvent', 'Hey');
//        $this->trigger(self::EVENT_CONTACT, $event);
//        $this->off(self::EVENT_CONTACT);


        $contact = new ContactForm();
        $errors = [];
        if($request->isPost()){
            $contact->loadData($request->getBody());
            if($contact->validate() && $contact->send()){
                Izi::$app->session->setFlash('success', 'Thank for contacted us!');
                $response->redirect('/contact');
            }
        }

        return $this->render('contact', [
            'errors' => $errors,
            'model' => $contact
        ]);
    }


    public function acb()
    {

    }
}