@extends('layouts.app')
@section('title', 'Bienvenidos a App Shop')

@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section">
      <h2 class="title  text-center" >Registrar nuevos productos</h2>
      @if ($errors->any)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <form method="POST" action="{{ url('/admin/productos') }}">
        @csrf
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group label-floating">
                  <label class="control-label">Nombre del producto</label>
                  <input type="text" class="form-control" value="{{old('name')}}" name="name">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group label-floating">
                  <label class="control-label">Precio del producto</label>
                  <input type="number" step="0.01" class="form-control" value="{{old('price')}}" name="price">
                </div>
              </div>
            </div> 
            <div class="row">
              <div class="col-sm-6">
                  <div class="form-group label-floating">
                      <label class="control-label">Descripcion corta del producto</label>
                      <input type="text" class="form-control" value="{{old('description')}}" name="description">
                </div> 
              </div>
              <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Categoría del producto</label>
                    <select class="form-control" name="category_id">
                      <option value="">General</option>
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                </div> 
              </div>
            </div> 

              <textarea class="form-control" placeholder="Descripción extensa del producto" rows="3" name="long_description">{{old('long_description')}}</textarea><br>
              <div class="radio">
                  <label>
                    <input type="radio" name="activo" value="SI" checked="true">
                    SI
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="activo" value="NO">
                    NO
                  </label>
                </div><br>
              <button type="submit" class="btn btn-primary">Registrar Producto</button>
              <a href="{{url('/admin/productos')}}" type="submit" class="btn btn-defaul">Cancelar</a>
      </form>
    </div>
  </div>
</div>

@endsection
