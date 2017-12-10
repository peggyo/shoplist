@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Shopping List
@endsection

@section('content')
    <div class='mainlist'>
        <section  class='pageheader'>
            <h1>Items to Buy</h1>
            <p></p>
            <hr>
        </section>
        @if(isset($ingredients))
            @foreach($ingredients as $key => $ingredient)
                <p>{{ $ingredient['title'].', '.$ingredient['quantity'].' '.$ingredient['unit'].' '}}
                </p>
            @endforeach
        @endif
    </div>

@endsection
