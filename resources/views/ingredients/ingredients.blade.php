@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Ingredients
@endsection

@section('content')
    <div class='mainlist'>
        <h1>Ingredients for: {{ $meal->title }}</h1>
        <p>{{ $meal->description }}</p>
        <a href='/meal/{{ $meal->id }}/add'> Add Ingredients </a>
        <hr>
        <div class='ingredlist'>
            @if(isset($ingredients))
                @foreach($ingredients as $key => $ingredient)
                    <p>{{ $ingredient['title'].', '.$ingredient['quantity'].' '.$ingredient['unit'].' '}}
                    <a href='/ingredient/{{ $ingredient['id'] }}/delete'>(remove)</a>
                    </p>
                @endforeach
            @else
                <p>{{'No ingredients found.'}}</p>
            @endif
        </div>
    </div>

@endsection
