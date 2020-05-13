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
    $phones = [
      "phones" => [
        ['name' => "Andrew Márcio", "chatid" => "5585989251561@c.us"],
        ['name' => "Chico bioca", "chatid" => "5585977777777@c.us"],
        ['name' => "Mateus", "chatid" => "5585988317266@c.us"],
        ['name' => "Do vale", "chatid" => "5585986292630@c.us"],
        ['name' => "Dibrajonson", "chatid" => "5585985182861@c.us"],
        ['name' => "Jhonata", "chatid" => "5585987126132@c.us"],
      ]
    ];
    return view('home', $phones);
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
