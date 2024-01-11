
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
        <li class="page-item"><a class="page-link" href="{{ $tasks->previousPageUrl() }}">Previous</a></li>
        @foreach ($tasks->links()->elements[0] as $index => $link )
            @if ($tasks->currentPage() === $index)
                <li class="page-item active"><a  class="page-link" href="{{ $link }}">{{ $index }}</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $link }}">{{ $index }}</a></li>
            @endif
        @endforeach
        <li class="page-item"><a class="page-link" href="{{ $tasks->nextPageUrl()}}">Next</a></li>
    </ul>
</div>

@endsection
