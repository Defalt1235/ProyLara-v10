@extends('Dashboard/master')
@section('content')
@include('Dashboard.fragment._errors-form')
<form action="{{ route('post.update', $post->id ) }}" method="post" enctype="multipart/form-data">
    @method('PATCH')
    @include('Dashboard.post._form',[ 'task' =>'edit' ])
</form>
    
