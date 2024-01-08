<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    @yield('styles')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @yield('title')
</head>
<body>
    <div class="app">
        @if (Auth::check())
        @include('layouts.authHeader')
        @else
        @include('layouts.notAuthHeader')
        @endif
        <div class="smudged-line"></div>
        <section>
          @yield('content')
        </section>
    </div>
    <script>
        $('.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
</body>
</html>
