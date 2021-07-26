<?php
/**
 * @link https://framework.iziweb.net
 * @copyright Copyright (c) 2021 Izi Software LLC
 * @license https://framework.iziweb.net/license
 */

namespace app\events;

/**
 * Class ContactEvent
 *
 * @package app\events
 * @author Giang A Tin <vantruong1898@gmail.com>
 * @since 1.0
 */
class ContactEvent extends \izi\base\Event
{
    public string $message;

    public function abc()
    {
        echo __METHOD__;
    }
}