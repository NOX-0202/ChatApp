<?php

use CoffeeCode\Router\Router;

require __DIR__ . '/vendor/autoload.php';

$router = new Router(SITE["baseUrl"]);

$router->namespace('Source\App');
$router->group(null);

// navegation
$router->get('/', "Web:home", "web.home");
$router->get('/chat', "Web:chat", "web.chat");


// send message
$router->post('/sendMessage', 'chat:sendMessage', "chat.sendMessage");

$router->dispatch();