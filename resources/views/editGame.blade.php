<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AddGame</title>
</head>
<body>
<div style="border: 3px solid;">
    <form action="/edit-game/{{$game->id}}" method="POST">
        @csrf
        @method('PUT')
        <input name = "title" type="text" placeholder="Game title" value = "{{$game->title}}">
        <input name = "publisher" type="text" placeholder="Publisher" value = "{{$game->publisher}}">
        <input name = "developer" type="text" placeholder="Developer" value = "{{$game->developer}}">
        <input name = "category1" type="text" placeholder="Category1" value = "{{$game->category1}}">
        <input name = "category2" type="text" placeholder="Category2" value = "{{$game->category2}}">
        <input name = "category3" type="text" placeholder="Category3" value = "{{$game->category3}}">
        <input name = "image" type="text" placeholder="Image" value = "{{$game->image}}">
        <textarea name="popis" type="text" placeholder="nieco o hre">{{$game->Popis}}</textarea> {{--//normalne by som sa zabil za toto velke pismeno na zaciatku 20 min debugu--}}
        <button>Uprav hru</button>
    </form>
    <a href="/back">Back</a>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>
