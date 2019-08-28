<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @section("css")

            @import url('https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap');

            @yield("stylesheet", view("emails.theme.reset"))

        @show
    </style>
    <title>@section("page-title") O'Quiz @show</title>
</head>
<body class="body">

<div class="body__container">

    @yield("body")

</div>

</body>
</html>
