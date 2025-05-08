@extends('Dashboard/master')
@section('content')
@include('Dashboard.fragment._errors-form')
<form action="{{ route('category.update', $category->id ) }}" method="post" >
    @method('PATCH')
    @include('Dashboard.category._form',[ 'task' =>'edit' ])
</form>
    
