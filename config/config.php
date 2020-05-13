<?php

require __DIR__."/../vendor/autoload.php";

use eftec\bladeone\BladeOne;

define("URL", "http://localhost/php/git/chat_bot_whatsapp");

define("CHAT", [
  "API_URL" => "https://eu6.chat-api.com/instance126511/",
  "TOKEN" =>  "9vhaj196wfolim20"
]);

function view(string $nameView, $values = []){


    $views = __DIR__.'/../resources/views'; // it uses the folder /views to read the templates
    $cache = __DIR__.'/../storage/cache/view'; // it uses the folder /cache to compile the result.

    $blade = new BladeOne($views,$cache,BladeOne::MODE_AUTO);
    echo $blade->run($nameView, $values);
}
