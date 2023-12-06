<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Games List</title>
</head>
<body>

    @foreach($games as $game)
        <div style = "background-color: rgb(128,128,128); padding: 10px; margin: 10px;">
            <h3><a href="/viewGames/{{$game->id}}/{{$game->title}}">{{$game['title']}}</a></h3>
            {{$game['developer']}}
            {{$game['publisher']}}
            @if(auth()->user()?->isAdmin)
            <p><a href="/edit-game/{{$game->id}}">Edit</a></p>
            <form action="/delete-game/{{$game->id}}" method = "POST">
                @csrf
                @method('DELETE')
                <button>DELETE</button>
            @endif
        </div>
    @endforeach
</body>
</html>
