@extends('layouts.master')

@section('title')
    Edit Meal
@endsection


@section('content')
    <h1>update Meal</h1>
    <form method='POST' action='/meal/create'>
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <div class='form-group'>
            <label for='title'>Meal:</label>
            <input name='title' id='title' type='text'  size='28' placeholder='Meal name (required)' type='text' value='{{ old('title', $meal->title) }}' >
            <!--<span class="hint">(Required)</span>-->

            <label for='description'>Description:</label>
            <input name='description' id='description' type='text' size='80' placeholder='Description (required)' value='{{ old('description', $meal->description))>
         </div>

         <input type='submit'  class='button' />
    </form>

    @if(isset($title))
        <h4>{{ $title }} updated.</h4>
    @endif
    @if(count($errors) > 0)
        <ul class='error-group'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
