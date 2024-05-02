@extends('frontapp::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('frontapp.name') !!}</p>
@endsection
