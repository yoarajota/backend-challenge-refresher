<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        .demo {
            border: 1px solid #C0C0C0;
            border-collapse: collapse;
            padding: 5px;
        }

        .demo th {
            border: 1px solid #C0C0C0;
            padding: 5px;
            background: #F0F0F0;
        }

        .demo td {
            border: 1px solid #C0C0C0;
            padding: 5px;
        }

        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <table class="demo">
        <caption>Books</caption>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Released</th>
                <th>Rating</th>
                <th></th>
                <th><button><a href="/form">Add</a></button></th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{$book->title}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->release_date}}</td>
                <td>{{$book->rating}}</td>
                <td><button><a href="/form/{{$book->id}}">Edit</a></button> </td>
                <td>
                    <form method="POST" action={{$book->id}}>
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete"/>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>