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

    return view('home');
  }

  public function welcome()
  {
    $message = $this->chat->welcome("5585989251561@c.us", "time");
    var_dump($message);
  }


  public function sendMessage($data){

    try {
      // var_dump($data);
      // return json_encode([teste => $data]);
      $number = "{$data['number']}@c.us";
      $send = $this->chat->sendMessage($number, $data['message']);
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
