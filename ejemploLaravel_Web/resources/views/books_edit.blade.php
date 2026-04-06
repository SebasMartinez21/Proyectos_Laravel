<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Editar Libro</title>
</head>

<body>
    <div class="container">
        <div>
            <form action="{{route('books.update', $book->id)}}" method="post">
                @csrf   
                @method('put')
                <label for="a1">Ingrese el nombre del libro: </label>
                <input type="text" name="name" id="a1" value="{{$book->name}}">
                <br>

                <label for="a2">Ingrese el precio: </label>
                <input type="number" name="price" id="a2" value="{{$book->price}}">
                <br>

                <button class="btn btn-warning" type="submit">Editar libro</button>
            </form>
        </div>
    </div>
</body>

</html>