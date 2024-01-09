
<table >
    <tr class="tableHeader">
        <td>ID</td>
        <td>{{ __('models.status') }}</td>
        <td>{{ __('models.name') }}</td>
        <td>{{ __('models.author') }}</td>
        <td>{{ __('models.executor') }}</td>
        <td>{{ __('models.dateCreation') }}</td>
    </tr>
    @foreach ($tasks as $task )
    <tr>
        <td>{{ $task->id }}</td>
        <td>{{ $task->status->name }} </td>
        <td>
            <a class="show" href="{{ route('tasks.show', $task) }}">{{ $task->status->name }}</a>
        </td>
        <td>{{ $task->author->name }}</td>
        <td>{{ $task->executor->name }}</td>
        <td>{{ date("d/m/Y", strtotime($task->created_at)) }}</td>
    </tr>
    @endforeach
</table>

