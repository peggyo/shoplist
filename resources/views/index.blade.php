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
        <div class='meallist'>
            <h5>{{ $meal['title'].': '. $meal['description'] }}</h5>
            <a href='/meal/{{ $meal['id'] }}/edit'> Edit </a> |
            <a href='/meal/{{ $meal['id'] }}/confirm'> Delete </a> |
            <a href='/meal/{{ $meal['id'] }}/ingredients'> Ingredients </a>
            <hr>
        </div>
    @endforeach

@endsection
