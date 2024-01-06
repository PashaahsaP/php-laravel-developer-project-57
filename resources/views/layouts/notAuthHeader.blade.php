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
            <div >
                <form action="/login">
                    @csrf
                    <input class="headerSubmit" type="submit" value="Войти">
                </form>
            </div>
            <div >
                <form action="/register">
                    @csrf
                    <input class="headerSubmit" type="submit" value="Регистрация">
                </form>
            </div>
        </div>
    </nav>
</header>
