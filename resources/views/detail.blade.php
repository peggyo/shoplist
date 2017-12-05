@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    View a Meal
@endsection

@section('content')

    <h1>MEAL DETAIL PAGE</h1>

    @if(isset($meal))
        <h4>Details for {{ $meal['title'] }}.</h4>
    @endif

@endsection
