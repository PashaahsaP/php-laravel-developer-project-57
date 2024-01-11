<form action="{{ route('tasks.index') }}">
    {{ Form::select('filter[status_id]', $statuses, $selectedStatus, ['class' => 'statusSelect selectClass','placeholder'=>  'Статус' ]) }}
    {{ Form::select('filter[author_id]', $authors, $selectedAuthor, ['class' => 'authorSelect selectClass','placeholder'=> 'Автор' ]) }}
    {{ Form::select('filter[executor_id]', $executors, $selectedExecutor, ['class' => 'executorSelect selectClass','placeholder'=>  'Исполнитель']) }}
    {{ Form::submit(__('button.submit'),['class' => 'headerSubmit'])}}<br>
</form>
