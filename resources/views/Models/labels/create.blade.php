@extends('layouts.main')

@section('styles')
    @vite(['resources/css/Label/create.css'])
@endsection

@section('title')
    <title>{{ __('models.createLabel') }}</title>
@endsection

@section('content')


    <h3 class="header-section">{{ __('models.createLabel') }}</h3>

    {{ Form::model($label, ['route' => ['labels.store', $label], 'method' => 'POST']) }}
        {{ Form::label('name', __('label.name') ) }}<br>
        {{ Form::text('name',null,['class' => 'inputText']) }}<br>

        @foreach ($errors->get('name') as $error)
            @if ($error === __('validation.unique',['attribute'=>'name']))
                <div style="color: red">{{ __('validation.unique',['attribute'=>"Метка"]) }}</div>
            @else
                <div style="color: red">{{ $error }}</div>
            @endif
        @endforeach

        {{ Form::label('description', __('label.description') ) }}<br>
        {{ Form::textarea('description',null,['class' => 'textArea']) }}<br>

        {{ Form::submit(__('button.create'),['class' => 'headerSubmit'])}}<br>
        @foreach ($errors->all() as $item)
        <div>{{ $item }}</div>
        @endforeach
    {{ Form::close() }}


@endsection
