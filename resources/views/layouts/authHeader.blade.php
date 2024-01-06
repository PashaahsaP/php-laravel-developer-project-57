<header>
    <nav class="nav-container">

        <div class="inner-nav-flex">
            <a class="headerSpan" href="#">
                Менеджер задач
            </a>
        </div>
        <div class="inner-nav-flex">
            <a class="middleLinkHeader" href="#">Задачи</a>
            <a class="middleLinkHeader" href="#">Статусы</a>
            <a class="middleLinkHeader" href="#">Метки</a>
        </div>
        <div class="inner-nav-flex">
            <div >
                <form action="/logout" method="POST">
                    @csrf
                    <input class="headerSubmit" type="submit" value="Выйти">
                </form>
            </div>
        </div>
    </nav>
</header>
