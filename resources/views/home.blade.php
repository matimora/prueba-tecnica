@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html>

<body class="w3-content" style="max-width:1200px">




<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

    <!-- Push down content on small screens -->
    <div class="w3-hide-large" style="margin-top:83px"></div>

    <!-- Top header -->
    <header class="w3-container w3-xlarge">
        <p class="w3-left">Lista de {{$title}} de {{$name}}</p>
        <p class="w3-left"><a href="/update" class="btn btn-warning">Modificar</a></p>
        <p class="w3-right">
            <a href="{{route('adding',['id'=>$id ?? '1009610'])}}" class="btn btn-success"> Agregar Evento</a>
        </p>
    </header>

    <!-- Image header -->

    <div class="w3-container w3-text-grey" >
        <p>{{$content}} items</p>
    </div>

    <!-- Product grid -->

    <div class="row">
        @foreach($data as $d)
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{$image_url}}.jpg">
                    <div class="card-body">
                        <h5 class="card-title">{{$d->name}}</h5>
                        <p class="card-text" id="description" ></p>
                        <a  class="btn btn-primary" id="details">Detalle</a>
                        <a  class="btn btn-danger" id="details">Eliminar</a>
                    </div>
                </div>
            </div>
        @endforeach

    <!-- Subscribe section -->



    <!-- End page content -->
</div>

<!-- Newsletter Modal -->


<script>

</script>

</body>
</html>
@endsection
