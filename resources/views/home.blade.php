<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1188c7635d.js" crossorigin="anonymous"></script>
  </head>
  <body>

    <!-- <div class="container mt-5">
      <div class="card">
        <div class="card-body">
          <form class="" id="firt-exemple-chat">
            <div class="form-group">
              <label for="">Phone</label>
              <input class="form-control" type="text" name="number" id="number">
            </div>
            <div class="form-group">
              <label for="">Mensagem</label>
              <textarea class="form-control" name="message" id="message" rows="8" cols="80"></textarea>
            </div>
            <button class="btn btn-primary btn-block" type="submit" id="enviar"> enviar </button>
          </form>
        </div>
      </div>
    </div> -->

    <!-- container de conversas  -->

    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-3" id="chatMessagePhofile">
          <div class="row">
            @include('components.headBar')
          </div>
          <div class="row">
            <ul class="list-group w-100">
              @foreach($phones as $key => $phone)
              <li class="list-group-item border-top border-bottom" style="border-style:none">
                <div class="row">
                  <img src="storage/img/user.png" alt="" width="32" height="32">
                  <a class="ml-4" id="chatMessage" href="#" data-chatid="{{$phone['chatid']}}">{{$phone['name']}}</a>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="col-sm-9">
          <div class="form-group" id="content-chat">
            <img class="img-fluid mx-auto d-block" src="https://cdn0.iconfinder.com/data/icons/social-media-2275/64/whatsapp-512.png" alt="">
          </div>
          <form id="firt-exemple-chat">
            <div class="form-group invisible" id="chat-message-user">
              <label for="" id="chat-user"></label>
              <input type="hidden" name="chatid">
              <textarea class="form-control" name="message" id="message" rows="8" cols="80"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">enviar</button>
          </form>
        </div>
      </div>
    </div>

    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function(){

      $('#chatMessagePhofile').on('click', '#chatMessage', function(){
        // alert($(this).data('chatid'))

        $('#content-chat').addClass('invisible').attr('style', 'display:none')
        $('#chat-message-user').removeClass('invisible')
        $('#chat-user').html($(this).html())
        $('input[name="chatid"]').val($(this).data('chatid'))
        $('#chat-message-user textarea').fadeIn('slow').val("")
      })


      $("#firt-exemple-chat").submit(function(e){
        e.preventDefault();

        $.ajax({
          type: "POST",
          url : "{{URL.'/chat'}}",
          data: $(this).serialize(),
          dataType: "json",
          success: function(data){
            console.log(data)
          },
          error:function(data){
            console.log(data)
          }
        })
      })

    });
  </script>
  </body>
</html>
