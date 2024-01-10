
@extends('layouts.main')

@section('title')
<title>{{ __('header.taskManager') }}</title>

@section('content')
@include('flash::message')
<div class="helloSection">
    <div>
        <h3 class="section-h3">{{ __('header.welcomeHexlet') }}</h3>
        <p class="section-p">{{ __('paragrath.mainPageAfterWelcomeH') }}</p>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="#ff0000" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
        </svg>


    </div>
</div>
@endsection
