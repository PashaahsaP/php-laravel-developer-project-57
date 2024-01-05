<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>Менеджер задач</title>
</head>
<body>
    <div class="app">
        @if ($isAuth)
            @include('layouts.authHeader')
        @else
            @include('layouts.notAuthHeader')
        @endif
        <div class="smudged-line"></div>
        <section>
            <div>
                <div>
                    <h3 class="section-h3">Привет от Хекслета!</h3>
                    <p class="section-p">Это просто менеджер задач на Laravel</p>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
