@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Edit List Name
@endsection

@section('content')
    <div class='mainlist'>
        <h1>Edit List Name</h1>
        <form method='POST' action='/selections/{{ $selection->id }}'>
            <!-- use method spoofing to replace POST with PUT -->

            {{ method_field('PUT') }}

            <!-- handles CSRF protection -->
            {{ csrf_field() }}

             <div class='form-group'>
             <label for='title'>List:</label>
             <input name='title' id='title' type='text'  size='28' placeholder='List name (required)' value='{{ old('title', $selection->title) }}'>
             <input type='submit'  class='button' value='Save Changes'/>
        </form>

        @if(isset($title))
            <h4>Change List name to {{ $title }}.</h4>
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
