
@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="css/Status/index.css">

@section('title')
<title>{{ __('link.statuses') }}</title>

@section('content')
@include('flash::message')

<h3 class="header-section">{{ __('link.statuses') }}</h3>

@if(Auth::check())
    @include('layouts.status.isAuthTable')
@else
    @include('layouts.status.isNotAuthTable')
@endif

@endsection
