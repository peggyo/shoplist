@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Edit Meal
@endsection

@section('content')
    <h1>Edit Meal</h1>
    <form method='POST' action='/meal/{{ $meal->id }}'>
        <!-- use method spoofing to replace POST with PUT -->

        {{ method_field('PUT') }}

        <!-- handles CSRF protection -->
        {{ csrf_field() }}

        <div class='form-group'>
            <label for='title'>Meal:</label>
            <input name='title' id='title' type='text' value='{{ old('title', $meal->title) }}'>
            <!--<span class="hint">(Required)</span>-->

            <label for='description'>Description:</label>
            <input name='description' id='description' type='text'value='{{ old('description', $meal->description) }}'>
         </div>

         <input type='submit'/>
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

@endsection