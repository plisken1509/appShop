@extends('layouts.app')


@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section">
      <h2 class="title  text-center" >Editar producto Seleccionado</h2>
      @if ($errors->any)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form method="POST" action="{{url('/admin/productos/'.$producto->id.'/editar')}}">
        @csrf
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Nombre del producto</label>
              <input type="text" class="form-control" name="name" value="{{old('name',$producto->name)}}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Precio del producto</label>
              <input type="number" step="0.01" class="form-control" name="price" value="{{old('price',$producto->price)}}">
            </div>
          </div>
        </div> 
        <div class="row">
          <div class="col-sm-6">
           <div class="form-group label-floating">
            <label class="control-label">Descripcion corta del producto</label>
            <input type="text" class="form-control" name="description" value="{{old('description',$producto->description)}}">
          </div> 
          </div>
          <div class="col-sm-6">
            <div class="form-group label-floating">
              <label class="control-label">Categoría del producto</label>
              <select class="form-control" name="category_id">
                <option value="">General</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" @if($category->id == old('category_id',$producto->category_id)) selected @endif>
                    {{$category->name}}                  
                </option>
                @endforeach
              </select>
            </div> 
          </div>
        </div> 
        <textarea class="form-control" placeholder="Descripción extensa del producto" rows="3" name="long_description">{{old('long_description',$producto->long_description)}}</textarea>
        <div class="radio">
          <label>
            <input type="radio" name="activo" value="SI" {{  ($producto->activo == "SI") ? 'checked' : '' }} checked="true">
            SI
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="activo" value="NO" {{  ($producto->activo == "NO") ? 'checked' : '' }}>
            NO
          </label>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="{{url('/admin/productos')}}" class="btn btn-default">Cancelar</a>
      </form>
    </div>
  </div>
</div>
@endsection
