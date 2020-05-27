<?php 
namespace Source\App;
use CoffeeCode\Router\Router;
use League\Plates\Engine;

abstract class Controller {

    protected $router;
    protected $view;

    public function __construct($router)
    {
        $this->router = $router;         
        $this->view = Engine::create(dirname(__FILE__ , 3) . "/views/", "php");
        $this->view->addData(["router" => $this->router]);
    }

}