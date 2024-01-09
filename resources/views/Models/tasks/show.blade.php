
@extends('layouts.main')

@section('styles')
@vite(["resources/css/Task/show.css"])

@section('title')
<title>{{ __('link.tasks') }}</title>

@section('content')
@include('flash::message')

<h3 class="header-section">{{ __('link.tasks') }}</h3>

@if(Auth::check())
    @include('layouts.tasks.isAuthTable')
@else
    @include('layouts.tasks.isNotAuthTable')
@endif

@endsection
