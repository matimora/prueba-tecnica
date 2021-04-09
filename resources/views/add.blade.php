@extends('layouts.app')


@section('content')
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>


<div class="w3-main" style="margin-left:250px">


    <div class="w3-hide-large" style="margin-top:83px"></div>


    <div class="row">
        <form action="/add" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputPassword1">Ingrese detalle del SuperHeroe</label>
                <input type="hidden" name="id" value="{{$id}}">
                <input type="text" class="form-control" name="type" placeholder="eventos,series o historias">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
