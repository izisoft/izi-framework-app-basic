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
function testEvent (\izi\base\Event $event){
    echo '<pre>';
    var_dump($event->data);
    echo '</pre>';
}

