@extends('layouts.app')

@section('title', 'Imagenes del producto')

@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h2 class="title">Imagenes del Producto "{{$product->name}}"</h2>
      <form action="" method="post" enctype="multipart/form-data">
          @csrf
          <input type="file" name="photo" accept="image/png, image/jpeg" required>
          <button type="submit" class="btn btn-primary btn-round">Subir nueva imagen</button>
          <a href="{{url('/admin/productos') }}" class="btn btn-default btn-round">Volver al listado de productos</a>
      </form>
      {{-- <div class="row">
          @foreach($imagenes as $imagen)
           <div class="col-md-4">
                <div class="panel panel-default">
                        <div class="panel-body">
                          <img src="{{$imagen->image}}">
                        </div>
              </div>
            </div>
          @endforeach
      </div> --}}
      <div class="row" >
        @foreach($images as $image)
        <div class="card m-4" style="width: 18rem;">
          <img class="card-img-top" src="{{ $image->url }}">
          <div class="card-body">
            <h5 class="card-title">Nombre</h5>
            <button type="submit" class="btn btn-danger btn-round">Eliminar</button>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
