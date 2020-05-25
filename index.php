<?php
  require __DIR__ . '/vendor/autoload.php';

  $pusher = new Pusher\Pusher(
    PUSHER_API_KEYS['key'],
    PUSHER_API_KEYS['secret'],
    PUSHER_API_KEYS['app_id'],
    PUSHER_API_KEYS['options']
  );

  $data['message'] = 'hello world';
  $pusher->trigger('my-channel', 'my-event', $data);

  include __DIR__ . "/src/examples/pusher.html";

?>

