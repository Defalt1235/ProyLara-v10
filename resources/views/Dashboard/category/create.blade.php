@extends('Dashboard/master')
@section('content')
@include('Dashboard.fragment._errors-form')
<form action="{{route('category.store')}}" method="post">
    @include('Dashboard.category._form')
</form>
    
