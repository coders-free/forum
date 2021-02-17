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
        @if ($code->voucher->image)
            <img class="img-fluid" src="{{$code->voucher->image}}" alt="">
        @else
            <img class="img-fluid" src="https://cdn.pixabay.com/photo/2020/12/10/20/40/color-5821297_960_720.jpg" alt="">
        @endif
      </div>
      <div class="container">
        <div class="container"><h2 style="color:#2b3e7f">Estimado(a) {{session('customer')->name}}</h2></div>
      </div>
    <div class="container">
      <div class="container"><h2 style="color:#2b3e7f">{{$code->voucher->title}}</h2></div>
      <div class="container"><h3 style="color:#2b3e7f">Beneficio valido hasta: {{$code->voucher->expiration_date->format('d/m/Y')}}</h3></div>
    </div>
    <div class="container">
      <div class="container"><h2 style="color:#0094d5">¿CÓMO PUEDES DISFRUTARLO?</h2></div>
      <div class="container"><h3 style="color:#2b3e7f">{{$code->voucher->description2}}</h3></div>
    </div>
    <div class="container">
      <div class="container"><h2 style="color:#0094d5">Código a canjear</h2></div>
      <div class="container"><h3 style="color:#2b3e7f">{{$code->value}}</h3></div>
    </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>