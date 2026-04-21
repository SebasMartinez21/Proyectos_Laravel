<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Editar usuario</title>
</head>
<body>
    <div class="container">
        <div>
            <form action="{{route('users.update', $user->id)}}" method="post">
                @csrf   
                @method('put')
                <label for="a1">Ingrese el nombre del usuario: </label>
                <input type="text" name="name" id="a1" value="{{$user->name}}">
                <br>

                <label for="a2">Ingrese su email: </label>
                <input type="email" name="email" id="a2" value="{{$user->email}}">
                <br>

                <label for="a3">Ingrese su contraseña: </label>
                <input type="password" name="password" id="a3">
                <br>

                <label for="a4">Seleccione un rol</label>
                <select name="id_rol" id="a4">
                    @foreach ($roles as $role)
                        <option value="{{$role->id}}" {{$user->id_rol == $role->id ? 'selected' : ''}} >{{$role->name}}</option>
                    @endforeach
                </select>
                <br>

                <button class="btn btn-success" type="submit">Editar Usuario</button>
            </form>
        </div>
    </div>
</body>
</html>