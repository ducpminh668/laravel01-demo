home
@extends('layouts.app')

@section('content')
<h1>Home</h1>
@endsection

@section('sidebar')
    @parent
    <p>this is append to sidebar</p>
@endsection
