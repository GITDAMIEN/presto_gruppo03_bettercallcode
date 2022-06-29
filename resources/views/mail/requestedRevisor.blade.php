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
        <h2 style="color: #0375B4; font-weight: 600; font-size: 30px">Grazie {{$user()->name}} per la tua richiesta!</h2>
        <p>Hai inviato correttamente la tua richiesta di diventare revisore per Presto.it</p>
        <p>Avrai riscontro sull'esito quanto prima!</p>
        <h5 style="font-weight: 600; color: #0375B4">Continua a trovare i migliori affari su Presto.it!</h5>
        <a href="{{route('/')}}" style="color:white; background-color: #E24E42; border-radius: 20px; text-decoration: none; padding: 10px">Vai su Presto.it</a>
    </div>
</body>
</html>