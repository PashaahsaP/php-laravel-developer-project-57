
@extends('layouts.main')

@section('styles')
@vite(["resources/css/Task/show.css"])

@section('title')
<title>{{ __('link.tasks') }}</title>

@section('content')
@include('flash::message')

<h3 class="header-section defenition">{{ __('models.viewingTask') }}
    <label class="headerLabel">{{ $task -> name }}</label>
</h3>

<label class="defenition">{{ __('label.name')}}:</label>
<label >{{ $task -> name }}</label><br>

<label class="defenition">{{ __('label.status')}}:</label>
<label >{{ $status -> name }}</label><br>

<label class="defenition">{{ __('label.description')}}:</label>
<label >{{ $task -> description }}</label><br>

@endsection
