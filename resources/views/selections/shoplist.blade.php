@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Shopping List
@endsection

@section('content')
    <h1>Items to Buy</h1>
    <p></p>
    <hr>
    <div class='ingredlist'>
        @if(isset($ingredients))
            @foreach($ingredients as $key => $ingredient)
                <p>{{ $ingredient['title'].', '.$ingredient['quantity'].' '.$ingredient['unit'].' '}}
                </p>
            @endforeach
        @endif
    </div>

@endsection
