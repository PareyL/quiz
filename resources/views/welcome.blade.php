<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Quiz Culture G</title>

        <!-- Fonts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>


        <!-- Styles -->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div style="display: flex; margin-top: auto; margin-bottom: auto; padding: 15px; width: 100%;">
            <div class="border p-4 mt-auto mb-auto w-100">
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
    </body>
</html>
