<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
</head>
<body>
    <div style="text-align: center; margin-top: 50px; margin-bottom: 100px">
        <h2 style="color: #0375B4; font-weight: 600; font-size: 30px">Ciao {{$user()->name}}!</h2>
        <h3 style="font-weight: 600">Buone notizie! La tua richiesta di diventare revisore è stata accettata!</h3>
        <h4 style="font-weight: 600; color: #0375B4; margin-bottom:20px">Inizia subito a revisionare gli annunci su Presto.it!</h4>
        <a href="{{route('/revisore/home')}}" style="color:white; background-color: #E24E42; border-radius: 20px; text-decoration: none; padding: 10px">Vai alla revisione annunci su Presto.it</a>
    </div>
</body>
</html>