
@extends('layouts.main')

@section('styles')
@vite(["resources/css/Status/index.css"])

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

<div id="paginationContainer">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="{{ $statuses->previousPageUrl() }}">Previous</a></li>
        @foreach ($statuses->links()->elements[0] as $index => $link )
            @if ($statuses->currentPage() === $index)
                <li class="page-item active"><a  class="page-link" href="{{ $link }}">{{ $index }}</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $link }}">{{ $index }}</a></li>
            @endif
        @endforeach
        <li class="page-item"><a class="page-link" href="{{ $statuses->nextPageUrl()}}">Next</a></li>
    </ul>
</div>


@endsection
