<form class="createStatus" action="{{ route('tasks.create') }}">
    <input class="headerSubmit" type="submit" value="{{ __('button.create') }}">
</form>

<table >
    <tr class="tableHeader">
        <td>ID</td>
        <td>{{ __('models.status') }}</td>
        <td>{{ __('models.name') }}</td>
        <td>{{ __('models.author') }}</td>
        <td>{{ __('models.executor') }}</td>
        <td>{{ __('models.dateCreation') }}</td>
        <td>{{ __('models.statusAction') }}</td>
    </tr>
    @foreach ($tasks as $task )
    <tr>
        <td>{{ $task->id }}</td>
        <td>{{ $task->status->name }} </td>
        <td>
            <a class="show" href="{{ route('tasks.show', $task) }}">{{ $task->name }}</a>
        </td>
        <td>{{ $task->author->name }}</td>
        <td>{{ $task->executor->name }}</td>
        <td>{{ date("d/m/Y", strtotime($task->created_at)) }}</td>
        <td>
            <a  class="delete" href="{{route('tasks.destroy',$task) }}"  data-confirm="Вы уверены?" data-method="delete" rel="nofollow">
                {{ __('models.statusDelete') }}</a>
            <a class="change" href="{{ route('tasks.edit',$task) }}">{{ __('models.statusChange') }}</a>
        </td>
    </tr>
    @endforeach
</table>

