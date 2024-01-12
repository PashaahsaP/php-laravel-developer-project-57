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
    <div class="flexContt">
        <div>
            {{ Form::label('name', __('label.name') ) }}<br>
        </div>
        <div>
            {{ Form::text('name',null,['class' => 'inputText']) }}<br>
            @foreach ($errors->get('name') as $error)
            @if ($error === __('validation.unique',['attribute'=>'name']))
                <div style="color: red">{{ __('validation.unique',['attribute'=>"Задача"]) }}</div>
            @else
                <div style="color: red">{{ $error }}</div>
            @endif
        @endforeach
        </div>
        <div>
            {{ Form::label('description', __('label.description') ) }}<br>
        </div>
        <div>
            {{ Form::textarea('description',null,['class' => 'textArea']) }}<br>
        </div>
        <div>
            {{ Form::label('status_id', __('label.status') ) }}<br>
        </div>
        <div>
            {{ Form::select('status_id', $statuses, $task->status_id, ['class' => 'selectClass', 'placeholder' => "---------"]) }}<br>
        </div>
        <div>
            {{ Form::label('assigned_to_id', __('label.executor') ) }}<br>
        </div>
        <div>
            {{ Form::select('assigned_to_id', $users, $task->created_by_id, ['class' => 'selectClass', 'placeholder' => "---------"]) }}
        </div>
        <div>
            {{ Form::label('labels', __('label.labels') ) }}<br>
        </div>
        <div>
            {{ Form::select('labels[]', $labels, $selectedlabels, ['class' => 'selectClass','multiple' => 'multiple']) }}
        </div>
        <div>
            {{ Form::submit(__('button.update'),['class' => 'headerSubmit'])}}<br>
        </div>

    </div>

    {{ Form::close() }}




@endsection
