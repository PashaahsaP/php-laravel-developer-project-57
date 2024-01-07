<header>
    <nav class="nav-container">

        <div class="inner-nav-flex">
            <a class="headerSpan" href="">
                {{ __('link.taskManager') }}
            </a>
        </div>
        <div class="inner-nav-flex">
            <a class="middleLinkHeader" href="#">{{ __('link.tasks') }}</a>
            <a class="middleLinkHeader" href="#">{{ __('link.statuses') }}</a>
            <a class="middleLinkHeader" href="#">{{ __('link.marks') }}</a>
        </div>
        <div class="inner-nav-flex">
            <div >
                <form action="/login">
                    <input class="headerSubmit" type="submit" value="{{ __('button.login') }}">
                </form>
            </div>
            <div >
                <form action="/register">
                    <input class="headerSubmit" type="submit" value="{{ __('button.registration') }}">
                </form>
            </div>
        </div>
    </nav>
</header>
