@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Dinner Plan
@endsection

@section('content')
    <h1>What's for Dinner?</h1>

    @if (count($meals) === 0)
        <h4>There are no meals to show.</h4>
    @endif

    @foreach($meals as $key => $meal)
        <div class='mainlist'>
            <h4>{{ $meal['title'].': '. $meal['description'] }}</h4>
            <a href='/meal/{{ $meal['id'] }}/edit'> Rename </a> |
            <a href='/meal/{{ $meal['id'] }}/confirm'> Delete </a>  |
            <a href='/meal/{{ $meal['id'] }}/ingredients'> Ingredients </a>
            <hr>
        </div>
    @endforeach

@endsection
