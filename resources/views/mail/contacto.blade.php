<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      <div class="container">
        <div class="container"><h2 style="color:#2b3e7f">Estimado(a), la siguiente solicitud se ha generado desde la plataforma de Beneficios</h2></div>
      </div>
    <div class="container">
      <div class="container"><h3 style="color:#2b3e7f">Nombre: {{$contacto['name']}}</h3></div>
      <div class="container"><h3 style="color:#2b3e7f">Correo: {{$contacto['email']}}</h3></div>
      <div class="container"><h3 style="color:#2b3e7f">Mensaje: {{$contacto['mensaje']}}</h3></div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>