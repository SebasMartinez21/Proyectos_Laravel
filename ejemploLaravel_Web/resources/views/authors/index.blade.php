<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Vista Autores</title>
</head>
<body>
    <div class="container">
        <div>
            <form action="{{route('authors.store')}}" method="post">
                @csrf   
                <label for="a1">Ingrese el nombre del autor: </label>
                <input type="text" name="name" id="a1">
                <br>

                <label for="a2">Ingrese la fecha de nacimiento: </label>
                <input type="date" name="born_date" id="a2">
                <br>

                <button class="btn btn-success" type="submit">Guardar autor</button>
            </form>
        </div>

        <h1>Listado de libros</h1>
        <table class=" table table-warning table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Fecha de nacimiento</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                <tr>
                    <td>{{$author->id}}</td>
                    <td>{{$author->name}}</td>
                    <td>{{$author->born_date}}</td>
                    <td>
                        <a href="{{route('authors.edit', $author->id)}}" class="btn btn-primary">Editar</a>
                        <form action="{{route('authors.destroy', $author->id)}}" method="post">
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