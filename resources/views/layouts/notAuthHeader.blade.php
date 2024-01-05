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
                <a href="{{ route('authenticateSession.create') }}">Вход</a>
            </div>
            <div class="blue-btn">
                <a href="{{ route('registerUser.create') }}">Регистрация</a>
            </div>
        </div>
    </nav>
</header>
