<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Editar autor</title>
</head>
<body>
    <div class="container">
        <div>
            <form action="{{route('authors.update', $author->id)}}" method="post">
                @csrf
                @method('put')
                <label for="a1">Nombre del autor: </label>
                <input type="text" name="name" id="a1" value="{{$author->name}}">
                <br>

                <label for="a2">Fecha de nacimiento: </label>
                <input type="date" name="born_date" id="a2" value="{{$author->born_date}}">
                <br>

                <button class="btn btn-warning" type="submit">Editar autor</button>
            </form>
        </div>
    </div>
</body>
</html>