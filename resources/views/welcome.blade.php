<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Quiz Culture G</title>

        <!-- Fonts -->
        <link href="app.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #000000;
            }
        </style>

    </head>
    <body>
    <div class="light" style="
        width: 100%;
        height: 100px;
    white-space: nowrap;
    overflow-x: hidden;">
        <ul class="line">
            <li class="red"></li>
            <li class="yellow"></li>
            <li class="blue"></li>
            <li class="pink"></li>
            <li class="red"></li>
            <li class="green"></li>
            <li class="blue"></li>
            <li class="yellow"></li>
            <li class="red"></li>
            <li class="pink"></li>
            <li class="blue"></li>
            <li class="yellow"></li>
            <li class="red"></li>
            <li class="green"></li>
            <li class="blue"></li>
            <li class="yellow"></li>
            <li class="red"></li>
            <li class="pink"></li>
            <li class="green"></li>
            <li class="blue"></li>
            <li class="pink"></li>
            <li class="red"></li>
            <li class="green"></li>
            <li class="blue"></li>
        </ul>
    </div>
    <div class="container">
        <div style="display: flex; margin-top: auto; margin-bottom: auto; padding: 15px; width: 100%;">
            <div class="border p-4 mt-auto mb-auto w-100 bg-white rounded">
                <form action="setPseudo" method="POST">
                    {{ csrf_field() }}
                    <h2>Entrez votre pseudo</h2>
                    <div class="input-group mb-3 mt-4">
                        <input type="text" class="form-control" placeholder="El Diablo" name="name">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">OK !</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function() {

            function randomInt(min, max) {
                return Math.floor(Math.random() * (max - min + 1) + min);
            };

            var limit_flake = 50;
            setInterval(function() {
                let dimension = randomInt(3, 9) + "px";
                var flake = "<div class='drop animate' style='left:" + randomInt(10, window.innerWidth - 20) + "px;width:" + dimension + ";height:" + dimension + "'></div>";
                $('body').append(flake);

                var list_flake = $('.drop');
                if (list_flake.length > limit_flake) list_flake[list_flake.length - 1].remove();
            }, 200);
        })
    </script>
    </body>
</html>
