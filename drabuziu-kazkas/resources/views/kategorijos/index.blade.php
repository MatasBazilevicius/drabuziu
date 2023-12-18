<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Product</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <div>
            <a href="{{route('kategorija.create')}}">Create a Kategorija</a>
        </div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Pavadinimas</th>
                <th>Aprasymas</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($kategorijos as $kategorija )
                <tr>
                    <td>{{$kategorija->id}}</td>
                    <td>{{$kategorija->pavadinimas}}</td>
                    <td>{{$kategorija->aprasymas}}</td>
                    <td>
                        <a href="{{route('kategorija.edit', ['kategorija' => kategorija])}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('kategorija.destroy', ['kategorija' => kategorija])}}">
                            @csrf 
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>