<?php

namespace App\Core;

use App\Core\Database;

class Application
{
    public string $layout = 'master';
    public string $userClass;
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Database $db;
    public ?DbModel $user;
    public View $view;


    public static Application $app;
    public ?Controller $controller = null; // added ? to make controller nullable

    public function __construct($basePath, array $config)
    {
        if ($basePath) {
            self::$ROOT_DIR =  $this->setBasePath($basePath);
        }

        $this->userClass = $config['userClass'];

        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();
        $this->db = new Database($config['db']);

        $primaryValue =  $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('_errors', [
                'exception' => $e,
            ]);
        }
    }

    public function setBasePath($basePath)
    {
        return self::$ROOT_DIR = rtrim($basePath, '\/');
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);

        return true; 
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
}
