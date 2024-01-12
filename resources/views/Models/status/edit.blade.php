@extends('layouts.main')

@section('styles')
    @vite(['resources/css/Status/edit.css'])
@section('title')
<title>{{ __('models.statusEditHeader') }}</title>

@section('content')

<h3 class="header-section">{{ __('models.statusEditHeader') }}</h3>

{{ Form::model($taskStatus, ['route' => ['task_statuses.update', $taskStatus], 'method' => 'PATCH']) }}
    {{ Form::label('name', __('label.name') ) }}
<br>
    {{ Form::text('name') }}
    @foreach ($errors->get('name') as $error)
        <div style="color: red">{{ $error }}</div>
    @endforeach

    {{ Form::submit(__("button.update"),['class' => 'headerSubmit'])}}<br>

{{ Form::close() }}


@endsection
