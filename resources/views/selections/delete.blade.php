@extends('layouts.master')

@push('head')
    <!--link href='/css/whoknows.css' rel='stylesheet'>-->
@endpush

@section('title')
    Confirm deletion: {{ $selection->title }}
@endsection

@section('content')
    <h1>Confirm deletion</h1>

    <p>Are you sure you want to delete <strong>{{ $selection->title }}</strong>?</p>

    <form method='POST' action='/selections/{{ $selection->id }}/delete'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type='submit' value='Confirm Deletion!'>
    </form>

    <p class='cancel'>
        <a href='{{ $previousUrl }}'>Cancel Deletion.</a>
    </p>

@endsection
