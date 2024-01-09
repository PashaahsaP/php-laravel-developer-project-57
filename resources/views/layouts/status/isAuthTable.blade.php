<form class="createStatus" action="{{ route('taskStatuses.create') }}">
    <input class="headerSubmit" type="submit" value="{{ __('button.create') }}">
</form>

<table >
    <tr class="tableHeader">
        <td>ID</td>
        <td>{{ __('models.name') }}</td>
        <td>{{ __('models.dateCreation') }}</td>
        <td>{{ __('models.statusAction') }}</td>
    </tr>
    @foreach ($statuses as $status )
    <tr>
        <td class="firstColumn">{{ $status->id }}</td>
        <td class="secondColumn">{{ $status->name }}</td>
        <td class="thirdColumn">{{ date("d/m/Y", strtotime($status->created_at))  }}</td>
        <td >
            <a  class="delete" href="{{route('taskStatuses.destroy',$status) }}"  data-confirm="Вы уверены?" data-method="delete" rel="nofollow">
                {{ __('models.statusDelete') }}</a>
            <a class="change" href="{{ route('taskStatuses.edit',$status) }}">{{ __('models.statusChange') }}</a>
        </td>
    </tr>
    @endforeach
</table>


