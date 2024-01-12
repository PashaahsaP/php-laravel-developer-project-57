<header>
    <nav class="nav-container">

        <div class="inner-nav-flex">
            <a class="headerSpan" href="\">
                {{ __('link.taskManager') }}
            </a>
        </div>
        <div class="inner-nav-flex">
            <a class="middleLinkHeader" href="{{ route('tasks.index') }}">{{ __('link.tasks') }}</a>
            <a class="middleLinkHeader" href="{{ route('task_statuses.index') }}">{{ __('link.statuses') }}</a>
            <a class="middleLinkHeader" href="{{ route('labels.index') }}">{{ __('link.labels') }}</a>
        </div>
        <div class="inner-nav-flex">
            <div >
            <a class="headerSubmit" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('button.logout') }} </a>

                <form id="logout-form" action="/logout" method="POST">
                    @csrf
                    <input class="headerSubmit" type="hidden" value="{{ __('button.logout') }}">
                </form>

            </div>
        </div>
    </nav>
</header>
