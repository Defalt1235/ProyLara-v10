@extends('Dashboard/master')
@section('content')
@include('Dashboard.fragment._errors-form')
<form action="{{route('post.store')}}" method="post">
    @include('Dashboard.post._form')
</form>
    
