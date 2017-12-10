@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Maintain Shopping List
@endsection

@section('content')
    <div class='mainlist'>
        <h1>Choose Meals for: {{ $selection->title }}</h1>
        <hr>

        <div class='duoleft'>
            <h4>Available to Add to {{ $selection->title }}:</h4>
            @if (count($outmeals) === 0)
                <p>There are no meals to show.</p>
            @endif

            @foreach($outmeals as $key => $outmeal)
                    <p>{{ $outmeal['title'] }}<a href='/selections/{{$selection->id}}/{{ $outmeal['id'] }}/movein'> Add &gt; </a></p>
            @endforeach

        </div>

        <div class='duoright'>
            <h4>Meals currently on {{$selection->title}}:</h4>
            @if (count($inmeals) === 0)
                <p>There are no meals to show.</p>
            @endif

            @foreach($inmeals as $key => $inmeal)
                    <p><a href='/selections/{{ $selection->id}}/{{ $inmeal['id'] }}/moveout'>  &lt; Remove </a>{{ $inmeal['title'] }}</p>
            @endforeach
        </div>
    </div>

@endsection
