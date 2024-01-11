
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

<div class="flexContainer">
@foreach ($task->marks as $mark )
    <div class="flexSvg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="#{{$mark->color}}" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
        </svg>
        <span style="color:{{ $mark->color }}">{{ $mark->name }}</span>
    </div>
    @endforeach
</div>

@endsection
