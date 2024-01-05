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
        <header>
            <nav class="nav-container">

                <div class="inner-nav-flex">
                    <a class="headerSpan" href="">
                        <span>Менеджер задач</span>
                    </a>
                </div>
                <div class="inner-nav-flex">
                    <a href=""><span>Задачи</span></a>
                    <a href=""><span>Статусы</span></a>
                    <a href=""><span>Метки</span></a>
                </div>
                <div class="inner-nav-flex">
                    <div class="blue-btn">
                        <a >Вход</a>
                    </div>
                    <div class="blue-btn">
                        <a href="{{ route('registerUser.create') }}">Регистрация</a>
                    </div>
                </div>
            </nav>
        </header>
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
