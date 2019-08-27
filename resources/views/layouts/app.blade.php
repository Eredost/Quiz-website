<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/reset.css') }}">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    @yield("additional-links")
    <title>@section("page-title") O'Quiz @show</title>
</head>
<body class="body">

    <div class="body__container">

        @yield("navbar", view("layouts.navbar"))

        @yield("body")

        @yield("footer", view("layouts.footer"))

    </div>

</body>
</html>
