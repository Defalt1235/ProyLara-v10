@extends('muestra')
@section('hola2')
<h1>Hola2 {{ $name }}</h1>
    @if($name != 'andres')
        tu nombre no es andres
    @else 
    hola {{$name}}
    @endif
    <u>
    @foreach ([1,2,3,4,5] as $item)
        <li>{{$item}}</li>
    @endforeach</u>
@endsection