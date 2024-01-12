@extends('layouts.main')

@section('styles')
    @vite(['resources/css/Label/edit.css'])
@endsection

@section('title')
    <title>{{ __('models.changeLabel') }}</title>
@endsection

@section('content')


    <h3 class="header-section">{{ __('models.changeLabel') }}</h3>

    {{ Form::model($label, ['route' => ['labels.update', $label], 'method' => 'PATCH']) }}
        {{ Form::label('name', __('label.name') ) }}<br>
        {{ Form::text('name',null,['class' => 'inputText']) }}<br>

        {{ Form::label('description', __('label.description') ) }}<br>
        {{ Form::textarea('description',null,['class' => 'textArea']) }}<br>

        {{ Form::submit(__('button.update'),['class' => 'headerSubmit'])}}<br>
        @foreach ($errors->all() as $item)
        <div>{{ $item }}</div>
        @endforeach
    {{ Form::close() }}


@endsection
