@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Add Ingredient
@endsection

@section('content')
    <h1>Add Ingredient for {{ $meal->title }}</h1>

    <form method='POST' action='/meal/add'>
        {{ csrf_field() }}
        <div class='form-group'>
            <label for='title'>Ingredient:</label>
            <input name='title' id='title' type='text' value=''>

            <label for='quantity'>Quantity:</label>
            <input name='quantity' id='quantity' type='text' value=''>

            <label for='unit'>Unit:</label>
            <input name='unit' id='unit' type='text' value=''>

            <label for='department'>Department:</label>
            <input name='department' id='department' type='text' value=''>

            <input name='meal_id' id='meal_id' type='hidden' value='{{$meal->id}}'>
         </div>

         <input type='submit'/>
    </form>

    @if(isset($title))
        <h4>Added {{ $title }} to your ingredient list.</h4>
    @endif
    @if(count($errors) > 0)
        <ul class='error-group'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class='currentlist'>
        @foreach($ingredients as $key => $ingredient)
                <p>{{ $ingredient['id'].' '.$ingredient['title']}}
                    <a href='/ingredient/{{ $ingredient['id'] }}/edit'> Edit </a>
                </p>
        @endforeach
    </div>


@endsection
