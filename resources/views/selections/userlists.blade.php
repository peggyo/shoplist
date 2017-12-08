@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Shopping Lists
@endsection

@section('content')
    <h1>Maintain Shopping Lists</h1>

    @if (count($selections) === 0)
        <h4>There are no shopping lists to show.</h4>
    @endif

    @foreach($selections as $key => $selection)
        <div class='mylist'>
            <h4>{{ $selection['title']}}</h4>
            <a href='/selections/{{ $selection['id'] }}/edit'> Rename </a> |
            <a href='/selections/{{ $selection['id'] }}/confirm'> Delete </a>  |
            <a href='/selections/{{ $selection['id'] }}/meals'> Meals </a>  |
            <a href='/selections/{{ $selection['id'] }}/shop'> Shopping List </a>
            <hr>
        </div>
    @endforeach

@endsection
