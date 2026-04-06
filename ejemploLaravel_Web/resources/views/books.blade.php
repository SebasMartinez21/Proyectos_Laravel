<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Vista Libros</title>
</head>

<body>
    <div class="container">
        <div>
            <form action="{{route('books.store')}}" method="post">
                @csrf   
                <label for="a1">Ingrese el nombre del libro: </label>
                <input type="text" name="name" id="a1">
                <br>

                <label for="a2">Ingrese el precio: </label>
                <input type="number" name="price" id="a2">
                <br>

                <button class="btn btn-success" type="submit">Guardar libro</button>
            </form>
        </div>
        <h1>Listado de libros</h1>
        <table class=" table table-danger table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->name}}</td>
                    <td>{{$book->price}}</td>
                    <td>
                        <a href="{{route('books.edit', $book->id)}}" class="btn btn-primary">Editar</a>
                        <form action="{{route('books.destroy', $book->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <ul>
            <li>Forma de mostrar elementos</li>
            <li>CRUD completo con este modelo</li>
        </ul>
    </div>
</body>

</html>