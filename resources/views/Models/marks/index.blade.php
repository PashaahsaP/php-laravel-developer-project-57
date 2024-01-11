
@extends('layouts.main')

@section('styles')
@vite(["resources/css/Mark/index.css"])

@section('title')
<title>{{ __('link.marks') }}</title>

@section('content')
@include('flash::message')

<h3 class="header-section">{{ __('link.marks') }}</h3>

@if(Auth::check())
    @include('layouts.marks.isAuthTable')
@else
    @include('layouts.marks.isNotAuthTable')
@endif

<a href="{{ $marks->nextPageUrl() }}">{{ $marks->currentPage()+1 }}</a>
{{ dump( )}}

@endsection
