@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Edit Meal
@endsection

@section('content')
<div class='mainlist'>
    <h1>Edit Meal</h1>
    <form method='POST' action='/meal/{{ $meal->id }}'>
        <!-- use method spoofing to replace POST with PUT -->
        {{ method_field('PUT') }}

        <!-- handles CSRF protection -->
        {{ csrf_field() }}

        <label for='title'>Meal:</label>
        <input name='title' id='title' type='text' size='28' placeholder='Meal name (required)' value='{{ old('title', $meal->title) }}'>
        <label for='description'>Description:</label>
        <input name='description' id='description' type='text' size='80' placeholder='Description (required)' value='{{ old('description', $meal->description) }}'>
        <input type='submit' class='button' value='Save Changes'/>
    </form>

        @if(isset($title))
            <h4>Changed meal name to {{ $title }}.</h4>
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
