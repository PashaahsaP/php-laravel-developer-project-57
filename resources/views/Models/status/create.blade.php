@extends('layouts.main')

@section('styles')
    @vite(['resources/css/Status/edit.css'])
@endsection

@section('title')
    <title>{{ __('models.statusCreateHeader') }}</title>
@endsection

@section('content')
    <h3 class="header-section">{{ __('models.statusCreateHeader') }}</h3>

    {{ Form::model($taskStatus, ['route' => ['task_statuses.store', $taskStatus], 'method' => 'POST']) }}
        {{ Form::label('name', __('label.name') ) }}  <br>

        @foreach ($errors->get('name') as $error)
            @if ($error === __('validation.unique',['attribute'=>'name']))
                <div style="color: red">{{ __('validation.unique',['attribute'=>"Статус"]) }}</div>
            @else
                <div style="color: red">{{ $error }}</div>
            @endif
        @endforeach

        {{ Form::text('name', null ,['class' => 'inputText']) }}<br>

        {{ Form::submit(__('button.create'),['class' => 'headerSubmit'])}}<br>

    {{ Form::close() }}
@endsection
