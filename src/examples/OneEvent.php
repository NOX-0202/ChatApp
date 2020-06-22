<?php
  require dirname(__DIR__, 2) . '/vendor/autoload.php';

  $pusher = new Pusher\Pusher(
    PUSHER_API_KEYS['key'],
    PUSHER_API_KEYS['secret'],
    PUSHER_API_KEYS['app_id'],
    PUSHER_API_KEYS['options']
  );

 // var_dump($pusher); 

  $data = [isset($_POST["message"])? $_POST["message"]: 'digite uma mensagem', date('Y-m-d H:')];

  $pusher->trigger('my-channel', 'my-event', $data);

  var_dump($pusher->get_channel_info('my-channel'));
?>

