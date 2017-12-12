@extends('layouts.master')

@section('title')
    View a Meal
@endsection

@section('content')

    <h1>MEAL DETAIL PAGE</h1>

    @if(isset($meal))
        <h4>Details for {{ $meal['title'] }}.</h4>
    @endif

@endsection
