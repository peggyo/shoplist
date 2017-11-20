@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Dinner Plan
@endsection

@section('content')
    <h1>What's for Dinner?</h1>

    @foreach($meals as $key => $meal)
        <div>
            <h4>{{ $meal['title'] }}</h4>
            <p>{{ $meal['description'] }} ID {{$meal['id']}}</p>
            <a href='/meal/{{ $meal['id'] }}/edit'>Edit</a>
        </div>
    @endforeach

@endsection
