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
        <form action="/addGame" method="POST">
            @csrf
            <input name = "title" type="text" placeholder="Game title">
            <input name = "publisher" type="text" placeholder="Publisher">
            <input name = "developer" type="text" placeholder="Developer">
            <input name = "category1" type="text" placeholder="Category1">
            <input name = "category2" type="text" placeholder="Category2">
            <input name = "category3" type="text" placeholder="Category3">
            <input name = "image" type="text" placeholder="Image">
            <textarea name="popis" type="text" placeholder="nieco o hre"></textarea>
            <button>Pridaj hru</button>


        </form>
    </div>

</body>
</html>