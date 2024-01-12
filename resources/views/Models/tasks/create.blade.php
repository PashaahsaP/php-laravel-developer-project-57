@extends('layouts.main')

@section('styles')
    @vite(['resources/css/Task/create.css'])
@endsection

@section('title')
    <title>{{ __('models.taskCreateHeader') }}</title>
@endsection

@section('content')
    <h3 class="header-section">{{ __('models.taskCreateHeader') }}</h3>

    {{ Form::model($task, ['route' => ['tasks.store', $task], 'method' => 'POST']) }}
        {{ Form::label('name', __('label.name') ) }}<br>
        {{ Form::text('name',null,['class' => 'inputText']) }}<br>

        {{ Form::label('description', __('label.description') ) }}<br>
        {{ Form::textarea('description',null,['class' => 'textArea']) }}<br>

        {{ Form::label('status', __('label.status') ) }}<br>
        {{ Form::select('status_id', $statuses, null, ['class' => 'selectClass', 'placeholder' => "---------"]) }}<br>

        {{ Form::label('authors', __('label.author') ) }}<br>
        {{ Form::select('author_id', $users, null, ['class' => 'selectClass', 'placeholder' => "---------"]) }}<br>

        {{ Form::label('marks', __('label.marks') ) }}<br>
        {{ Form::select('marks[]', $marks, null, ['class' => 'selectClass','multiple' => 'multiple', null]) }}

        {{ Form::submit(__('button.create'),['class' => 'headerSubmit'])}}<br>
        @foreach ($errors->all() as $item)
        <div>{{ $item }}</div>
        @endforeach
    {{ Form::close() }}




@endsection
