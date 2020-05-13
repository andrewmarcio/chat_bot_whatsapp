<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  </head>
  <body>

    <div class="container mt-5">
      <div class="card">
        <div class="card-body">
          <form class="">
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
    </div>

    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function(){

      $("form").submit(function(e){
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
