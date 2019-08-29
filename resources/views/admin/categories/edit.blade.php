@extends('layouts.app')


@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section">
      <h2 class="title  text-center" >Editar Categoria Seleccionada</h2>
      @if ($errors->any)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <form method="POST" action="{{url('/admin/categories/'.$category->id.'/editar')}}">
        @csrf
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group label-floating">
                  <label class="control-label">Nombre de la categoría</label>
                  <input type="text" class="form-control" name="name" value="{{old('name',$category->name)}}">
                </div>
              </div>
            </div> 
                <div class="form-group label-floating">
                  <label class="control-label">Descripcion de la categoría</label>
                  <input type="text" class="form-control" name="description" value="{{old('description',$category->description)}}">
                </div> 
              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
              <a href="{{url('/admin/categories')}}" class="btn btn-default">Cancelar</a>
      </form>
    </div>
  </div>
</div>
@endsection
