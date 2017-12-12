@extends('layouts.master')

@section('title')
    Confirm deletion: {{ $meal->title }}
@endsection

@section('content')
    <div class='mainlist'>
        <h1>Confirm deletion</h1>

        <p>Are you sure you want to delete <strong>{{ $meal->title }}</strong>?</p>
        <p>Meal will be deleted from all shopping lists</p>
        <p>All ingredients for {{$meal->title}} will be deleted.</p>

        <form method='POST' action='/meal/{{ $meal->id }}/delete'>
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <input type='submit'  class='button' value='Confirm Deletion!'>
        </form>

        <p class='cancel'>
            <a href='{{ $previousUrl }}'>Cancel Deletion.</a>
        </p>
    </div>
@endsection
