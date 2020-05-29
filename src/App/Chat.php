<?php 
namespace Source\App;

use Pusher\Pusher;
use Source\Models\Username;

class Chat extends Controller {

    private $socket;

    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function chat(): void
    {
        $users = (new Username())->find()->fetch(true);

        $result = [];

        foreach ($users as $user) {
            $result[] = $user->username;
        }

        echo $this->view->render('chat', [
            "title" => SITE['title'],
            "user" => $_SESSION["user"],
            "users" => $result  
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
        $this->connectSocket();

        $message = filter_var($data["message"], FILTER_SANITIZE_STRIPPED);
        $user = filter_var($data["user"], FILTER_SANITIZE_STRIPPED);

        $send = $this->socket->trigger('my-channel', 'message', [
            'message' => $message,
            'user' => $user
        ]);

        if ($send) {
            echo json_encode([
                "ok" => true
            ]);
        }
    }

    public function online_users ($data) {

        $this->connectSocket();

        $user = filter_var($data["username"], FILTER_SANITIZE_STRIPPED);

        $this->socket->trigger('my-channel', 'update-user', [
            'user' => $user
        ]);
    }

    public function adduser($data)
    {
        $user = new Username();

        $user->username = $_SESSION["user"];
        $user->socket = $data["id"];

        $user->save();

        $_SESSION["id_user"] = $user->id;

    }

    public function deluser($data)
    {

        $user = (new Username())->findById($_SESSION["id_user"]);

        $user->destroy();
    }
}

    