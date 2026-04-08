<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Editar autor y libro</title>
</head>
<body>
    <div class="container">
        <div>
            <form action="{{route('author_books.update', $author_book->id)}}" method="post">
                @csrf
                @method('put')
                <label for="a1">Seleccione un libro</label>
            <select name="id_book" id="a1">
                @foreach ($books as $book)
                    <option value="{{$book->id}}" {{ $author_book->id_book == $book->id ? 'selected' : '' }}>{{$book->name}}</option>
                @endforeach
            </select>
            <br>

            <label for="a2">Seleccione un autor</label>
            <select name="id_author" id="a2">
                @foreach ($authors as $author)
                    <option value="{{$author->id}}" {{ $author_book->id_author == $author->id ? 'selected' : '' }}>{{$author->name}}</option>
                @endforeach
            </select>
            <br>

            <label for="a3">Fecha</label>
            <input type="date" name="date" id="a3" value="{{$author_book->date}}">
            <br>

            <button class="btn btn-danger" type="submit">Edición lista</button>
            </form>
        </div>
    </div>
</body>
</html>