
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

<div id="paginationContainer">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="{{ $marks->previousPageUrl() }}">Previous</a></li>
        @foreach ($marks->links()->elements[0] as $index => $link )
            @if ($marks->currentPage() === $index)
                <li class="page-item active"><a  class="page-link" href="{{ $link }}">{{ $index }}</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $link }}">{{ $index }}</a></li>
            @endif
        @endforeach
        <li class="page-item"><a class="page-link" href="{{ $marks->nextPageUrl()}}">Next</a></li>
    </ul>
</div>

@endsection
