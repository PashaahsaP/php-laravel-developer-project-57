@extends('layouts.main')

@section('styles')
    <link rel="stylesheet" href="css/Status/edit.css">
    @vite(['public/css/Status/edit.css'])
@endsection

@section('title')
    <title>{{ __('models.statusCreateHeader') }}</title>
@endsection

@section('content')
    <h3 class="header-section">{{ __('models.statusCreateHeader') }}</h3>

    {{ Form::model($taskStatus, ['route' => ['taskStatuses.store', $taskStatus], 'method' => 'POST']) }}
        {{ Form::label('name', __('label.name') ) }}
    <br>
        {{ Form::text('name') }}
        {{ Form::submit(__('button.create'),['class' => 'headerSubmit'])}}<br>
    {{ Form::close() }}
@endsection
