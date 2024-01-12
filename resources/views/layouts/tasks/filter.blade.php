<form action="{{ route('tasks.index') }}">
    {{ Form::select('filter[status_id]', $statuses, $selectedStatus, ['class' => 'statusSelect selectClass','placeholder'=>  __('label.status') ]) }}
    {{ Form::select('filter[created_by_id]', $authors, $selectedAuthor, ['class' => 'authorSelect selectClass','placeholder'=> __('models.author') ]) }}
    {{ Form::select('filter[assigned_to_id]', $executors, $selectedExecutor, ['class' => 'executorSelect selectClass','placeholder'=>  __('models.executor')]) }}
    {{ Form::submit(__('button.submit'),['class' => 'headerSubmit'])}}<br>
</form>
