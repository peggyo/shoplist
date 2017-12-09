@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Maintain Shopping List
@endsection

@section('content')
    <h1>Meals included in {{ $selection->title }}</h1>
    <hr>

    <div class='duoleft'>
        <h4>Available to Add to {{ $selection->title }}:</h4>
        @if (count($outmeals) === 0)
            <p>There are no meals to show.</p>
        @endif

        @foreach($outmeals as $key => $outmeal)
            <div class=''>
                <p>{{ $outmeal['title'] }}<a href='/selections/{{$selection->id}}/{{ $outmeal['id'] }}/movein'> Add => </a></p>
            </div>
        @endforeach

    </div>

    <div class='duoright'>
        <h4>Meals currently on {{$selection->title}}:</h4>
        @if (count($inmeals) === 0)
            <p>There are no meals to show.</p>
        @endif

        @foreach($inmeals as $key => $inmeal)
            <div class=''>
                <p><a href='/selections/{{ $selection->id}}/{{ $inmeal['id'] }}/moveout'> <= Remove </a>{{ $inmeal['title'] }}</p>
            </div>
        @endforeach
    </div>


@endsection
