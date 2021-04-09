@extends('layouts.app')

@section('content')
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

    <!-- Push down content on small screens -->
    <div class="w3-hide-large" style="margin-top:83px"></div>
    <div class="w3-container">
        <div class="row">
            <form action="/up" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Ingrese id Superheroe</label>
                    <input type="numeric" class="form-control" name="id" placeholder="1009268">
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
@endsection

