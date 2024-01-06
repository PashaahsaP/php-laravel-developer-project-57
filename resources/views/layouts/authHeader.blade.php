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
                <form action="/logout" method="POST">
                    @csrf
                    <input type="submit" value="Выйти">
                </form>

            </div>
        </div>
    </nav>
</header>
