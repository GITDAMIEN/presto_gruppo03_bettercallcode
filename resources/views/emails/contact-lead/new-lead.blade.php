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
        <h2>Un utente ha chiesto di diventare revisore.</h2>
        <h4>Ecco i suoi dati:</h4>
        <h5>Nome: {{$user->name}}</h5>
        <p>Email: {{$user->email}}</p>
        <p>Messaggio:</p>
        <p>{{$lead->messagetxt}}</p>
        {{-- {{$form->cv}} --}}
        <p>Clicca qui per renderlo revisore:</p>
        <a href="{{route('makeRevisor', compact('user'))}}">Rendi {{$user->name}} revisore</a>
    </div>
</body>
</html>