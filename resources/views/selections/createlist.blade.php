@extends('layouts.master')

@section('title')
    Add a List
@endsection

@section('content')
    <div class='mainlist'>
        <h1>New List</h1>
        <form method='POST' action='/selections/createlist'>
            {{ csrf_field() }}
            <label for='title'>List:</label>
            <input name='title' id='title' type='text'   size='28' placeholder='List name (required)' value=''>
             <input type='submit' class='button' value='Save List'/>
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
    </div>
@endsection
