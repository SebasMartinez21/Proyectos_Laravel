<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Vista Roles</title>
</head>
<body>
    <div class="container">
        <div>
            <form action="{{route('roles.store')}}" method="post">
                @csrf   
                <label for="a1">Ingrese el nombre del rol: </label>
                <input type="text" name="name" id="a1">
                <br>

                <label for="a2">Ingrese su descripción: </label>
                <input type="text" name="description" id="a2">
                <br>

                <button class="btn btn-success" type="submit">Guardar Rol</button>
            </form>
        </div>

        <h1>Listado de Roles de usuarios</h1>
        <table class=" table table-success table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->description}}</td>
                    <td>
                        <a href="{{route('roles.edit', $role->id)}}" class="btn btn-primary">Editar</a>
                        <form action="{{route('roles.destroy', $role->id)}}" method="post">
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