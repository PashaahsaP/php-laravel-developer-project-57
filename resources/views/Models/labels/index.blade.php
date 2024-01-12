
@extends('layouts.main')

@section('styles')
@vite(["resources/css/Label/index.css"])

@section('title')
<title>{{ __('link.labels') }}</title>

@section('content')
@include('flash::message')

<h3 class="header-section">{{ __('link.labels') }}</h3>

@if(Auth::check())
    @include('layouts.labels.isAuthTable')
@else
    @include('layouts.labels.isNotAuthTable')
@endif

<div id="paginationContainer">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="{{ $labels->previousPageUrl() }}">{{ __('pagination.previous') }}</a></li>
        @foreach ($labels->links()->elements[0] as $index => $link )
            @if ($labels->currentPage() === $index)
                <li class="page-item active"><a  class="page-link" href="{{ $link }}">{{ $index }}</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $link }}">{{ $index }}</a></li>
            @endif
        @endforeach
        <li class="page-item"><a class="page-link" href="{{ $labels->nextPageUrl()}}">{{ __('pagination.next') }}</a></li>
    </ul>
</div>

@endsection
