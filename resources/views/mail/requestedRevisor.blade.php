<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
</head>
<body>
    <div>
        <h2>Grazie {{$user()->name}} per la tua richiesta!</h2>
        <p>Hai inviato correttamente la tua richiesta di diventare revisore per Presto.it</p>
        <p>Avrai riscontro sull'esito quanto prima!</p>
        <p>Continua a trovare i migliori affari su Presto.it!</p>
        <a href="{{route('/')}}">Vai su Presto.it</a>
    </div>
</body>
</html>