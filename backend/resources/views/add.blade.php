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
    <div>
        <form action={{$book ? "$book->id" : 'store'}} method="POST">
            @csrf
            <div>
                <label>Title</label>
                <input type="text" id="title" name="title" value={{$book->title ?? ""}}>
            </div>
            <div>
                <label>Author:</label>
                <input type="text" id="author" name="author" value={{$book->author ?? ""}}>
            </div>
            <div>
                <label>Release Date:</label>
                <input type="date" id="release_date" name="release_date" value={{$book->release_date ?? ""}}>
            </div>
            <div>
                <label>Rating:</label>
                <select id="rating" name="rating" }}>
                    <option value="1" {{$book ? ($book->rating == 1 ? "selected" : "") : ""}}>1</option>
                    <option value="2" {{$book ? ($book->rating == 2 ? "selected" : "") : ""}}>2</option>
                    <option value="3" {{$book ? ($book->rating == 3 ? "selected" : "") : ""}}>3</option>
                    <option value="4" {{$book ? ($book->rating == 4 ? "selected" : "") : ""}}>4</option>
                    <option value="5" {{$book ? ($book->rating == 5 ? "selected" : "") : ""}}>5</option>
                </select>
            </div>
            <input type='submit' value="Enviar">
        </form>
    </div>
</body>

</html>