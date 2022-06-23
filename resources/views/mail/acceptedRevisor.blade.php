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
        <h2>Ciao {{$user()->name}}!</h2>
        <h3>Buone notizie! La tua richiesta di diventare revisore è stata accettata!</h3>
        <p>Inizia subito a revisionare gli annunci su Presto.it!</p>
        <a href="{{route('/revisore/home')}}">Vai alla revisione annunci su Presto.it</a>
    </div>
</body>
</html>