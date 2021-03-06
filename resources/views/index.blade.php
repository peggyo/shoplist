@extends('layouts.master')

@section('title')
    Dinner Plan
@endsection

@section('content')

    @if (count($meals) === 0)
        <h4>There are no meals to show.</h4>
    @endif

    @foreach($meals as $key => $meal)
        <div class='mainlist'>
            <h4>{{ $meal['title'].': '. $meal['description'] }}</h4>
            <a href='/meal/{{ $meal['id'] }}/edit'> Edit </a>
            <a href='/meal/{{ $meal['id'] }}/confirm'> Delete </a>
            <a href='/meal/{{ $meal['id'] }}/ingredients'> Ingredients </a>
            <hr>
        </div>
    @endforeach

@endsection
