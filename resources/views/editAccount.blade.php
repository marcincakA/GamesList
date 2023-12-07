<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <form action="/editAccount/{{$user->id}}" method="POST">
        @csrf
        @method('PUT')
        <input name="name" type="text" placeholder="name" value="{{$user->name}}">
        <input name = "email" type="text" placeholder="email" value="{{$user->email}}">
        <input name ="password" type="password" placeholder="password">
        @auth
            Is admin:<input name = "isAdmin" type="checkbox"  {{$user->isAdmin == 1 ? 'checked' : ''}}>
        @endauth
        <button>Uprav ucet</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/deleteAccount/{{$user->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button>DELETE ACCOUNT</button>
    </form>
</body>
</html>
