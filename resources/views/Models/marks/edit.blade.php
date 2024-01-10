@extends('layouts.main')

@section('styles')
    @vite(['resources/css/Mark/edit.css'])
@endsection

@section('title')
    <title>{{ __('models.changeMark') }}</title>
@endsection

@section('content')


    <h3 class="header-section">{{ __('models.changeMark') }}</h3>

    {{ Form::model($mark, ['route' => ['marks.update', $mark], 'method' => 'PATCH']) }}
        {{ Form::label('name', __('label.name') ) }}<br>
        {{ Form::text('name',null,['class' => 'inputText']) }}<br>

        {{ Form::label('description', __('label.description') ) }}<br>
        {{ Form::textarea('description',null,['class' => 'textArea']) }}<br>

        {{ Form::submit(__('button.change'),['class' => 'headerSubmit'])}}<br>
    {{ Form::close() }}


@endsection
