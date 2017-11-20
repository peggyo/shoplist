@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Edit Meal
@endsection

<!-- IN PROGRESS. THIS IS TO EDIT AN EXISTING MEAL, BUT CODE FOR NOW IS MAINLY FROM CREATE A MEAL  -->

@section('content')
    <h1>update Meal</h1>
    <form method='POST' action='/meal/create'>
        {{ csrf_field() }}
        <div class='form-group'>
            <label for='title'>Meal:</label>
            <input name='title' id='title' type='text' value=''>
            <!--<span class="hint">(Required)</span>-->

            <label for='description'>Description:</label>
            <input name='description' id='description' type='text' value=''>
         </div>

         <input type='submit'/>
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
