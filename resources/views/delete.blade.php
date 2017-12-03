@extends('layouts.master')

@push('head')
    <!--link href='/css/whoknows.css' rel='stylesheet'>-->
@endpush

@section('title')
    Confirm deletion: {{ $meal->title }}
@endsection

@section('content')
    <h1>Confirm deletion</h1>

    <p>Are you sure you want to delete <strong>{{ $meal->title }}</strong>?</p>

    <form method='POST' action='/meal/{{ $meal->id }}/delete'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type='submit' value='Yes, delete it!' class='btn btn-danger btn-small'>
    </form>

    <p class='cancel'>
        <a href='{{ $previousUrl }}'>No, I changed my mind.</a>
    </p>

@endsection
