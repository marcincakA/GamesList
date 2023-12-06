<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$game->title}}</title>
</head>
<body>
    <div>
        <h1>{{$game->title}}</h1>
    </div>
    <div>
        <ul> {{--tu treba for loop pre kazdy nenulovy atribut--}}
            <li>Publisher: {{$game->publisher}}</li>
            <li>Developer: {{$game->developer}}</li>
            <li>{{$game->category1}}</li>
            <li>{{$game->category2}}</li>
            <li>{{$game->category3}}</li>
        </ul>
    </div>
    <div>
        <img src="{{$game->image}}">
    </div>
    <div>
        {{$game->Popis}}
    </div>
</body>
</html>
