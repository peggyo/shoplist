@extends('layouts.master')

@section('title')
    Confirm deletion: {{ $selection->title }}
@endsection

@section('content')
    <div class='mainlist'>
        <h1>Confirm deletion</h1>

        <p>Are you sure you want to delete <strong>{{ $selection->title }}</strong>?</p>
        <p>All meal associations will also be removed.</p>

        <form method='POST' action='/selections/{{ $selection->id }}/delete'>
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <input type='submit' class='button' value='Confirm Deletion!'>
        </form>

        <p class='cancel'>
            <a href='{{ $previousUrl }}'>Cancel Deletion.</a>
        </p>
    </div>

@endsection
