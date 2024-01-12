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

        @foreach ($errors->get('name') as $error)
            @if ($error === __('validation.unique',['attribute'=>'name']))
                <div style="color: red">{{ __('validation.unique',['attribute'=>"Задача"]) }}</div>
            @else
                <div style="color: red">{{ $error }}</div>
            @endif
        @endforeach

        {{ Form::label('description', __('label.description') ) }}<br>
        {{ Form::textarea('description',null,['class' => 'textArea']) }}<br>

        {{ Form::label('status', __('label.status') ) }}<br>
        {{ Form::select('status_id', $statuses, null, ['class' => 'selectClass', 'placeholder' => "---------"]) }}<br>

        {{ Form::label('executor', __('label.executor') ) }}<br>
        {{ Form::select('assigned_to_id', $users, null, ['class' => 'selectClass', 'placeholder' => "---------"]) }}<br>

        {{ Form::label('labels', __('label.labels') ) }}<br>
        {{ Form::select('labels[]', $labels, null, ['class' => 'selectClass','multiple' => 'multiple', null]) }}

        {{ Form::submit(__('button.create'),['class' => 'headerSubmit'])}}<br>
        @foreach ($errors->all() as $item)
        <div>{{ $item }}</div>
        @endforeach
    {{ Form::close() }}




@endsection
