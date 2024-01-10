
@extends('layouts.main')

@section('title')
<title>{{ __('header.taskManager') }}</title>

@section('content')
@include('flash::message')
<div class="helloSection">
    <div>
        <h3 class="section-h3">{{ __('header.welcomeHexlet') }}</h3>
        <p class="section-p">{{ __('paragrath.mainPageAfterWelcomeH') }}</p>
    </div>
</div>
@endsection
