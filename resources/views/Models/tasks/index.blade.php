
@extends('layouts.main')

@section('styles')
@vite(["resources/css/Task/index.css"])

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

<div id="paginationContainer">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        @foreach ($tasks->links()->elements[0] as $index => $link )
             <li class="page-item"><a class="page-link" href="{{ $link }}">{{ $index }}</a></li>
        @endforeach
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    </ul>
</div>
@dump(@$tasks->links()->elements[1])
@endsection
