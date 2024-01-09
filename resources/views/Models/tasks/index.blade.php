
@extends('layouts.main')

@section('styles')
@vite(["resources/css/Task/index.css"])

@section('title')
<title>{{ __('link.tasks') }}</title>

@section('content')
@include('flash::message')

<h3 class="header-section">{{ __('link.tasks') }}</h3>



@endsection
