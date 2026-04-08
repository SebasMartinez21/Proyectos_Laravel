<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Vista autores y libros</title>
</head>
<body>
    <div class="container">
        <form action="{{route('author_books.store')}}" method="post">
            @csrf

            <label for="a1">Seleccione un libro</label>
            <select name="id_book" id="a1">
                @foreach ($books as $book)
                    <option value="{{$book->id}}">{{$book->name}}</option>
                @endforeach
            </select>
            <br>

            <label for="a2">Seleccione un autor</label>
            <select name="id_author" id="a2">
                @foreach ($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>
            <br>

            <label for="a3">Fecha</label>
            <input type="date" name="date" id="a3">
            <br>

            <button class="btn btn-danger" type="submit">Enviar</button>
        </form>

        <h1>Listado de autores y libros</h1>
        <table class=" table table-danger table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre Autor</th>
                    <th>Nombre del libro</th>
                    <th>Fecha</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($author_books as $author_book)
                <tr>
                    <td>{{$author_book->id}}</td>
                    <td>{{$author_book->author->name ?? 'N/A'}}</td>
                    <td>{{$author_book->book->name ?? 'N/A'}}</td>
                    <td>{{$author_book->date}}</td>
                    <td>
                        <a href="{{route('author_books.edit', $author_book->id)}}" class="btn btn-primary">Editar</a>
                        <form action="{{route('author_books.destroy', $author_book->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>