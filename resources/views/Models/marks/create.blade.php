@extends('layouts.main')

@section('styles')
    @vite(['resources/css/Mark/create.css'])
@endsection

@section('title')
    <title>{{ __('models.createMark') }}</title>
@endsection

@section('content')


    <h3 class="header-section">{{ __('models.createMark') }}</h3>

    {{ Form::model($mark, ['route' => ['marks.store', $mark], 'method' => 'POST']) }}
        {{ Form::label('name', __('label.name') ) }}<br>
        {{ Form::text('name',null,['class' => 'inputText']) }}<br>

        {{ Form::label('description', __('label.description') ) }}<br>
        {{ Form::textarea('description',null,['class' => 'textArea']) }}<br>

        {{ Form::submit(__('button.create'),['class' => 'headerSubmit'])}}<br>
    {{ Form::close() }}


@endsection
