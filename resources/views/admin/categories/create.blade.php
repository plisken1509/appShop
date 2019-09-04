@extends('layouts.app')
@section('title', config('app.name'). ' | Crear Categorias')

@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section">
      <h2 class="title  text-center" >Registrar nuevas categorias</h2>
      @if ($errors->any)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <form method="POST" action="{{ url('/admin/categories') }}">
        @csrf
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group label-floating">
                  <label class="control-label">Nombre de la categoria</label>
                  <input type="text" class="form-control" value="{{old('name')}}" name="name">
                </div>
              </div>
            </div> 
            <div class="form-group label-floating">
              <label class="control-label">Descripcion de la categoria</label>
              <input type="text" class="form-control" value="{{old('description')}}" name="description">
            </div> 
              <button type="submit" class="btn btn-primary" >Registrar Categoría</button>
              <a href="{{url('/admin/productos')}}" type="submit" class="btn btn-defaul">Cancelar</a>
      </form>
    </div>
  </div>
</div>

@endsection
