<?php 
namespace Source\App;

class Web extends Controller {

    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function home(): void
    {
        echo $this->view->render('login', [
            "title" => SITE['title']
        ]);
    }

}

    