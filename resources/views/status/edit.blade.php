@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="css/Status/edit.css">
@vite(['public/css/Status/edit.css'])
@section('title')
<title>{{ __('models.statusEditHeader') }}</title>

@section('content')

<h3 class="header-section">{{ __('models.statusEditHeader') }}</h3>

{{ Form::model($taskStatus, ['route' => ['taskStatuses.update', $taskStatus], 'method' => 'PATCH']) }}
    {{ Form::label('name', __('label.name') ) }}
<br>
    {{ Form::text('name') }}
    {{ Form::submit(__("button.change"),['class' => 'headerSubmit'])}}<br>
{{ Form::close() }}


@endsection
