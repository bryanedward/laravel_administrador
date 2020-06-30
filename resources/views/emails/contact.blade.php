<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    <div class="card">
        <div class="card-header">
        Mensajees desde nuestro servidor de prueba
    </div>
        <div class="card-body">
          <h5 class="card-title">{{$msg->nombre}}</h5>
          <p class="card-text">{{$msg->mensaje}}</p>
    </div>
</body>
</html>