<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Vista Usuarios</title>
</head>
<body>
    <div class="container">
        <div>
            <form action="{{route('users.store')}}" method="post">
                @csrf   
                <label for="a1">Ingrese el nombre del usuario: </label>
                <input type="text" name="name" id="a1">
                <br>

                <label for="a2">Ingrese su email: </label>
                <input type="email" name="email" id="a2">
                <br>

                <label for="a3">Ingrese su contraseña: </label>
                <input type="password" name="password" id="a3">
                <br>

                <label for="a4">Seleccione un rol</label>
                <select name="id_rol" id="a4">
                    @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
                <br>

                <button class="btn btn-success" type="submit">Guardar Usuario</button>
            </form>
        </div>

        <h1>Listado de Usuarios</h1>
        <table class=" table table-warning table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol de usuario</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name ?? 'N/A'}}</td>
                    <td>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">Editar</a>
                        <form action="{{route('users.destroy', $user->id)}}" method="post">
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