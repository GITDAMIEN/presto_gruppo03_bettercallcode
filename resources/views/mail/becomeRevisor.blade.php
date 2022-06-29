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
        <h2 style="color: #0375B4; font-weight: 600; font-size: 30px">Un utente ha chiesto di diventare revisore per Presto.it</h2>
        <h3>Ecco i suoi dati:</h3>
        <h4>Username:</h4><span>{{$user->name}}</span>
        <h4>Email:</h4><span>{{$user->email}}</span>
        <h4>Messaggio:</h4><span>{{$lead->messagetxt}}</span>
        <p style="text-decoration: underline; margin-top: 50px">Vedi il curriculum in allegato</p>
        <h4 style="font-weight: 600; color: #0375B4; margin-bottom:20px">Clicca qui per renderlo revisore:</h4>
        <a href="{{route('makeRevisor', compact('user'))}}" style="color:white; background-color: #E24E42; border-radius: 20px; text-decoration: none; padding: 10px">Rendi {{$user->name}} revisore</a>
    </div>
</body>
</html>