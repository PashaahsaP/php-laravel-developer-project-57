<a class="headerSubmit" onclick="event.preventDefault(); document.getElementById('createStatus').submit();">{{ __('button.createStatus') }} </a>

                <form id="createStatus" action="{{ route('task_statuses.create') }}" method="GET">
                    @csrf
                    <input class="headerSubmit" type="hidden" >
                </form>

<table >
    <thead>
        <tr class="tableHeader">
            <td>ID</td>
            <td>{{ __('models.name') }}</td>
            <td>{{ __('models.dateCreation') }}</td>
            <td>{{ __('models.statusAction') }}</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($statuses as $status )
        <tr>
            <td class="firstColumn">{{ $status->id }}</td>
            <td class="secondColumn">{{ $status->name }}</td>
            <td class="thirdColumn">{{ date("d/m/Y", strtotime($status->created_at))  }}</td>
            <td >
                <a  class="delete" href="{{route('task_statuses.destroy',$status) }}"  data-confirm="{{ __('flash.areYouSure')}}" data-method="delete" rel="nofollow">
                    {{ __('models.statusDelete') }}</a>
                <a class="change" href="{{ route('task_statuses.edit',$status) }}">{{ __('models.statusChange') }}</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


