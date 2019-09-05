@extends('layouts.app')

@section('title', config('app.name'). ' | Listado de categorias')

@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h2 class="title">Listado Categorias</h2>
      <div class="team">
        <div class="row">
          <a href="{{url('/admin/categories/crear') }}" class="btn btn-primary btn-round">Nueva Categoria</a>
          <table class="table" >
            <thead>
             <th class="text-center" WIDTH="100" HEIGHT="100">#</th>
             <th WIDTH="200" HEIGHT="50">Nombre</th>
             <th WIDTH="400" {{-- HEIGHT="450" --}}>Descripcion</th>
             <th>Imagen</th>
             <th class="text-center">Opciones</th>
           </thead>
           <tbody>
            @foreach($categorias as $categoria)
            <tr>
              <th class="text-center">{{$categoria->id}}</th>
              <td>{{$categoria->name}}</td>
              <td><h6>{{$categoria->description}}</h6></td>
              <td><img src="{{$categoria->featured_image_url}}" height="50"></td>
              <td class="td-actions text-right">
                <form class="text-center" method="post" action="{{url('/admin/categories/'.$categoria->id)}}">
                  @csrf
                  @method('DELETE')
                  <a href="{{url('/productos/'.$categoria->id)}}" target="_blank" rel="tooltip" title="Ver Categoria" class="btn btn-primary btn-simple btn-link btn-info btn-xs{{-- btn btn-success btn-simple btn-xs --}}">
                    <i class="fa fa-info"></i>
                  </a>
                  <a href="{{url('/admin/categories/'.$categoria->id.'/editar')}}" rel="tooltip" title="Editar Categoria" class="btn btn-primary btn-simple btn-link btn-success btn-xs{{-- btn btn-success btn-simple btn-xs --}}">
                    <i class="fa fa-edit"></i>
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
        {{$categorias->links()}}
      </div>
    </div>
  </div>
</div>
</div>
@endsection
