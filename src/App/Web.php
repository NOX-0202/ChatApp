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

    public function error($data): void
    {
        echo $this->view->render('error', [
            "title" => SITE['title'],
            "error" => $data["errcode"]
        ]);
    }

}

    