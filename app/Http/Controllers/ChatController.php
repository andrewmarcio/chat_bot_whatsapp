<?php

namespace App\Http\Controllers;

use App\Http\Controllers\WhatsAppBot;
/**
 *
 */
class ChatController
{

  private $chat = null;

  function __construct()
  {
    $this->chat = new WhatsAppBot();
  }

  public function home(){

    // model users name, chatid, profile: caminho da imagem de perfil
    $users = file_get_contents('database/teste/users.json');
    $data = json_decode($users, true);

    $users = [
      "users" => $data
    ];
    return view('home', $users);
  }

  public function group($author)
  {
    try {
      return $this->chat->group($author);
    } catch (\Exception $e) {
      echo $e->getMessage();
    }

  }

  public function welcome()
  {
    return $this->chat->welcome("5585989251561@c.us", "time");
    // var_dump($message);
  }


  public function sendMessage($data){

    try {
      // var_dump($data);
      // return json_encode([teste => $data]);
      // $number = "{$data['number']}@c.us";
      $send = $this->chat->sendMessage($data['chatid'], $data['message']);
      // var_dump($number);
      if ($send) {
        echo "Messagem enviada";
      }
    } catch (\Exception $e) {
      echo $e->getMessage();
    }


  }
}


?>
