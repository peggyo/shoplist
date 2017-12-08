@extends('layouts.master')

@section('title')
    Add a List
@endsection

@section('content')
    <h1>New List</h1>
    <form method='POST' action='/selections/createlist'>
        {{ csrf_field() }}
        <div class='form-group'>
            <label for='title'>List:</label>
            <input name='title' id='title' type='text' value=''>
            <!--<span class="hint">(Required)</span>-->
         </div>
         </br>
         <input type='submit' value='Save List'/>
    </form>

    @if(isset($title))
        <h4>Added {{ $title }} to your set of Shopping Lists.</h4>
    @endif
    @if(count($errors) > 0)
        <ul class='error-group'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
