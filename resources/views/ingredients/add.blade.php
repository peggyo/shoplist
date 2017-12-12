@extends('layouts.master')

@section('title')
    Add Ingredient
@endsection

@section('content')
    <div class='mainlist'>
        <h1>Add Ingredients for {{ $meal->title }}</h1>
        <hr><br>
        <form method='POST' action='/meal/add'>
            {{ csrf_field() }}

            <label for='title'>Ingredient:</label>
            <input name='title' id='title' type='text' size='30' placeholder='Ingredient name (required)' value='{{ old('title') }}'>

            <label for='quantity'>Quantity:</label>
            <input name='quantity' id='quantity' type='number' size='10' placeholder='#.##' value='{{ old('quantity') }}'>

            <label for='unit'>Unit:</label>
            <input name='unit' id='unit' type='text'  size='30' placeholder='(Oz, Cup, Jar, Bunch, Clove...)' value='{{ old('unit') }}'>

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

            <input type='submit' class='button' value='Save Ingredient'/>

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

        <div class='ingredlist'>
            <a href='/meal/{{ $meal->id }}/ingredients'>Back to Meal</a>
            @foreach($ingredients as $key => $ingredient)
                    <p>{{ $ingredient['title']}}</p>
            @endforeach
        </div>
    </div>

@endsection
