@extends('nav')

<style>
    .container {
        background-color: rgb(228, 228, 228);
    }
</style>

@section('navbar')
<a href="{{ url()->previous() }}" class="btn btn-primary">Regresar</a>

<br>

<img src="{{asset('storage/'.$id->nro_carnet_img)}}" class="img-thumbnail" alt="">

@endsection