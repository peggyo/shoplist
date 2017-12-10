@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Add a Meal
@endsection

@section('content')
    <div class='mainlist'>
        <h1>New Meal</h1>
        <form method='POST' action='/meal/create'>
            {{ csrf_field() }}
            <label for='title'>Meal:</label>
            <input name='title' id='title' size='28' placeholder='Meal name (required)' type='text' value='{{ old('title') }}' >
            <!--<span class="hint">(Required)</span>-->
            <label for='description'>Description:</label>
            <input name='description' id='description' type='text' size='80' placeholder='Description (required)' value='{{ old('description') }}'>
            <input type='submit' class='button' value='Save Meal'/>
        </form>

        @if(isset($title))
            <h4>Added {{ $title }} to your meal set.</h4>
        @endif
        @if(count($errors) > 0)
            <ul class='error-group'>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>

@endsection
