@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Add Ingredient
@endsection

@section('content')
    <h1>Add Ingredients for {{ $meal->title }}</h1>
    <hr>
    <form method='POST' action='/meal/add'>
        {{ csrf_field() }}
        <div class='form-group'>
            <label for='title'>Ingredient:</label>
            <input name='title' id='title' type='text' value=''>

            <label for='quantity'>Quantity:</label>
            <input name='quantity' id='quantity' type='number' value=''>

            <label for='unit'>Unit:</label>
            <input name='unit' id='unit' type='text' value=''>

            <select name='department' id='department'>
               <option value='Grocery' {{ old('department') == 'Grocery' ? 'selected' : '' }} >Grocery</option>
               <option value='Produce' {{ old('department') == 'Produce' ? 'selected' : '' }} >Produce</option>
               <option value='Deli' {{ old('department') == 'Deli' ? 'selected' : '' }} >Deli</option>
               <option value='Meat' {{ old('department') == 'Meat' ? 'selected' : '' }} >Meat</option>
               <option value='Dairy' {{ old('department') == 'Dairy' ? 'selected' : '' }} >Dairy</option>
               <option value='Spices' {{ old('department') == 'Spices' ? 'selected' : '' }} >Spices</option>
               <option value='Bakery' {{ old('department') == 'Bakery' ? 'selected' : '' }} >Bakery</option>
           </select>

            <input name='meal_id' id='meal_id' type='hidden' value='{{$meal->id}}'>
         </div>

         <input type='submit' value='Save'/>
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
                <p>{{ $ingredient['title']}}</p>
        @endforeach
        <a href='/meal/{{ $meal->id }}/ingredients'>Back to Meal</a>
    </div>

@endsection
