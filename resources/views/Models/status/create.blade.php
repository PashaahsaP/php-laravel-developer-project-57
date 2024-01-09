@extends('layouts.main')

@section('styles')
    @vite(['resources/css/Status/edit.css'])
@endsection

@section('title')
    <title>{{ __('models.statusCreateHeader') }}</title>
@endsection

@section('content')
    <h3 class="header-section">{{ __('models.statusCreateHeader') }}</h3>

    {{ Form::model($taskStatus, ['route' => ['taskStatuses.store', $taskStatus], 'method' => 'POST']) }}
        {{ Form::label('name', __('label.name') ) }}
    <br>
        {{ Form::text('name', null ,['class' => 'inputText']) }}
        {{ Form::submit(__('button.create'),['class' => 'headerSubmit'])}}<br>
    {{ Form::close() }}
@endsection
