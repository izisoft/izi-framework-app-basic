<?php
/**
 * @link https://framework.iziweb.net
 * @copyright Copyright (c) 2021 Izi Software LLC
 * @license https://framework.iziweb.net/license
 */

namespace app\controllers;
use Izi;
use izi\middlewares\BaseMiddleware;

/**
 * Class Controller
 *
 * @package app\controllers
 * @author Giang A Tin <vantruong1898@gmail.com>
 * @since 1.0
 */
class Controller extends \izi\web\Controller
{

    public string $layout = 'main';
    public string $action = '';

    /**
     * @var BaseMiddleware[]
     */

    protected array $middlewares = [];

    public function render($view, $params = [])
    {
        return Izi::$app->view->renderView($view, $params);
    }

    public function setLayout(string $layout)
    {
        $this->layout = $layout;
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * @return BaseMiddleware[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }

    /**
     * @param BaseMiddleware[] $middlewares
     */
    public function setMiddlewares(array $middlewares): void
    {
        $this->middlewares = $middlewares;
    }



}