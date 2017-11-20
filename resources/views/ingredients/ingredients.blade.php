@extends('layouts.master')

@push('head')
    <!--<link href='/css/whoknows?.css' rel='stylesheet'>-->
@endpush

@section('title')
    Ingredients
@endsection

@section('content')
    <h1>Ingredients for {{ $meal->title }}</h1>

@endsection
