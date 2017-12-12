@extends('layouts.master')

@section('title')
    Shopping List
@endsection

@section('content')
    <div class='mainlist'>
        <h1>Items to Buy:</h1>
        <hr>
        @if(isset($ingredients))
            @foreach($ingredients as $key => $ingredient)
                <p>{{ $ingredient['title'].', '.$ingredient['quantity'].' '.$ingredient['unit'].' '}}
                </p>
            @endforeach
        @endif
    </div>

@endsection
