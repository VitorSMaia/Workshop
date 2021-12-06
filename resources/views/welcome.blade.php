@extends('layouts.app')
@section('content')
    <h1>{{var_dump(Auth::check())}}</h1>
@endsection('content')

