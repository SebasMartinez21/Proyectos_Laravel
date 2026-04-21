<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Editar Rol</title>
</head>
<body>
    <div class="container">
        <div>
            <form action="{{route('roles.update', $role->id)}}" method="post">
                @csrf
                @method('put')
                <label for="a1">Nombre del Rol: </label>
                <input type="text" name="name" id="a1" value="{{$role->name}}">
                <br>

                <label for="a2">Descripción: </label>
                <input type="text" name="description" id="a2" value="{{$role->description}}">
                <br>

                <button class="btn btn-warning" type="submit">Editar Rol</button>
            </form>
        </div>
    </div>
</body>
</html>