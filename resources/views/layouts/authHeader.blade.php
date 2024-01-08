<header>
    <nav class="nav-container">

        <div class="inner-nav-flex">
            <a class="headerSpan" href="\">
                {{ __('link.taskManager') }}
            </a>
        </div>
        <div class="inner-nav-flex">
            <a class="middleLinkHeader" href="#">{{ __('link.tasks') }}</a>
            <a class="middleLinkHeader" href="{{ route('taskStatuses.index') }}">{{ __('link.statuses') }}</a>
            <a class="middleLinkHeader" href="#">{{ __('link.marks') }}</a>
        </div>
        <div class="inner-nav-flex">
            <div >
                <form action="/logout" method="POST">
                    @csrf
                    <input class="headerSubmit" type="submit" value="{{ __('button.logout') }}">
                </form>
            </div>
        </div>
    </nav>
</header>
