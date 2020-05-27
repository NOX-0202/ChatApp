<?php 
namespace Source\App;

use Pusher\Pusher;

class Chat extends Controller {

    private $socket;

    public function __construct($router)
    {
        parent::__construct($router);
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

        echo json_encode([
            "url" => $this->router->route("chat.chat")
        ]);
    }

    private function connectSocket()
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

        return $this->socket;
    } 
    
    public function sendMessage($data)
    {
        $socket = $this->connectSocket();

        $message = filter_var($data["message"], FILTER_SANITIZE_STRIPPED);
        $user = filter_var($data["user"], FILTER_SANITIZE_STRIPPED);

        $send = $this->socket->trigger('my-channel', 'my-event', [
            'message' => $message,
            'user' => $user
        ]);

        if ($send) {
            echo json_encode([
                "ok" => true
            ]);
        }
    }
}

    