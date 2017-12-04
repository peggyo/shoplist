@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Ingredients
@endsection

@section('content')
    <h1>Ingredients for {{ $meal->title }}</h1>

    <div class='ingredlist'>
        @foreach($ingredients as $key => $ingredient)
                <p>{{ $ingredient['title'].', '.$ingredient['quantity'].' '.$ingredient['unit'].' '}}
                    <a href='/ingredient/{{ $ingredient['id'] }}/delete'>(remove)</a>
                </p>
        @endforeach
        <a href='/meal/{{ $meal->id }}/add'> Add </a>
    </div>


@endsection
