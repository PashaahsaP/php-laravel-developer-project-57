@extends('layouts.main')

@section('styles')
    @vite(['resources/css/Task/create.css'])
@endsection

@section('title')
    <title>{{ __('models.taskEditHeader') }}</title>
@endsection

@section('content')
    <h3 class="header-section">{{ __('models.taskEditHeader') }}</h3>

    {{ Form::model($task, ['route' => ['tasks.update', $task], 'method' => 'PATCH']) }}
        {{ Form::label('name', __('label.name') ) }}<br>
        {{ Form::text('name',null,['class' => 'inputText']) }}<br>

        {{ Form::label('description', __('label.description') ) }}<br>
        {{ Form::textarea('description',null,['class' => 'textArea']) }}<br>

        {{ Form::label('status', __('label.status') ) }}<br>
        {{ Form::select('status_id', $statuses, $task->status_id, ['class' => 'selectClass', 'placeholder' => "---------"]) }}<br>

        {{ Form::label('authors', __('label.author') ) }}<br>
        {{ Form::select('author_id', $users, $task->author_id, ['class' => 'selectClass', 'placeholder' => "---------"]) }}

        {{ Form::submit(__('button.change'),['class' => 'headerSubmit'])}}<br>
    {{ Form::close() }}




@endsection
