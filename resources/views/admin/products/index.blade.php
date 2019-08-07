@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h2 class="title">Listado Productos</h2>
      <div class="team">
        <div class="row">
          <a href="{{url('/admin/productos/crear') }}" class="btn btn-primary btn-round">Nuevo Producto</a>
          <table class="table" >
            <thead>
             <th class="text-center" WIDTH="50" HEIGHT="50">#</th>
             <th WIDTH="50" HEIGHT="50">Nombre</th>
             <th WIDTH="400" {{-- HEIGHT="450" --}}>Descripcion</th>
             <th>Categoria</th>
             <th class="cold-md-2 text-center">Precio</th>
             <th class="text-center">Opciones</th>
           </thead>
           <tbody>
            @foreach($productos as $producto)
            <tr>
              <th class="text-center">{{$producto->id}}</th>
              <td>{{$producto->name}}</td>
              <td {{-- class="cold-md-8" --}}><h6>{{$producto->description}}</h6></td>
              <td>{{$producto->category ? $producto->category->name : 'General'}}</td>
              <td class="text-right">&euro; {{$producto->price}}</td>
              <td class="td-actions text-right">


                <form method="post" action="{{url('/admin/productos/'.$producto->id)}}">
                  @csrf
                  @method('DELETE')
                  <a href="{{url('/admin/productos/'.$producto->id.'/editar')}}" rel="tooltip" title="Ver Producto" class="btn btn-primary btn-simple btn-link btn-info btn-xs{{-- btn btn-success btn-simple btn-xs --}}">
                    <i class="fa fa-info"></i>
                  </a>
                  <a href="{{url('/admin/productos/'.$producto->id.'/editar')}}" rel="tooltip" title="Editar Producto" class="btn btn-primary btn-simple btn-link btn-success btn-xs{{-- btn btn-success btn-simple btn-xs --}}">
                    <i class="fa fa-edit"></i>
                  </a>
                  <a href="{{url('/admin/products/'.$producto->id.'/images')}}" rel="tooltip" title="Imagenes del producto" class="btn btn-warning btn-simple btn-link btn-info btn-xs{{-- btn btn-success btn-simple btn-xs --}}">
                    <i class="fa fa-image"></i>
                  </a>
                  <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-primary btn-link btn-danger btn-xs{{-- btn btn-danger btn-simple btn-xs --}}">
                    <i class="fa fa-times"></i>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{$productos->links()}}
      </div>
    </div>
  </div>
</div>
</div>
@endsection
