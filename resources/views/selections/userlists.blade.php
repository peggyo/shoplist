@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Shopping Lists
@endsection

@section('content')
    <div class='mainlist'>
        <h1  class='pageheader'>Manage Shopping Lists</h1>
        @if (count($selections) === 0)
            <h4>There are no shopping lists to show.</h4>
        @endif

        @foreach($selections as $key => $selection)
                <h3>{{ $selection['title']}}</h3>
                <a href='/selections/{{ $selection['id'] }}/edit'> Rename </a>
                <a href='/selections/{{ $selection['id'] }}/confirm'> Delete </a>
                <a href='/selections/{{ $selection['id'] }}/meals'> Choose Meals </a>
                <a href='/selections/{{ $selection['id'] }}/shop'> Get Shopping List </a>
                <hr>
        @endforeach
    </div>

@endsection
