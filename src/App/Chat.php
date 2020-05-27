<?php 
namespace Source\App;

use Pusher\Pusher;

class Chat extends Controller {

    private $socket;

    public function __construct($router)
    {
        parent::__construct($router);

        if (empty($_SESSION["user"])) {
            $this->router->redirect('web.home');
        }
    }

    public function chat($data): void
    {
        echo $this->view->render('chat', [
            "title" => SITE['title'],
            "user" => $_SESSION["user"]       
        ]);
    }
    
    public function validade($data)
    {
        $user = filter_var($data["user"], FILTER_SANITIZE_STRIPPED);

        $_SESSION["user"] = $user;

        if (!$this->connectSocket()) {
            return;
        }

        echo json_encode([
            "url" => $this->router->route('web.chat'),
            "user" => $_SESSION["user"]
        ]);

    }


    private function connectSocket(): Chat
    {

        $this->socket = new Pusher(
            PUSHER_API_KEYS["key"],
            PUSHER_API_KEYS["secret"],
            PUSHER_API_KEYS["app_id"],
            PUSHER_API_KEYS["options"]
        );


        if (!$this->socket) {
            return null;
        }

        return $this;
    } 
    
    public function sendMessage()
    {
        # code...
    }
}

    