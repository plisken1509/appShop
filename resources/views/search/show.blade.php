@extends('layouts.app')
@section('title', 'App Shop | Resultados de busqueda')

@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')"></div>
<div class="main main-raised">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="profile">
            <div class="avatar">
              <img src="/img/search.png" alt="Imagen de una lupa que representa a la página de resultados" class="img-raised rounded-circle img-fluid">
            </div>
            <div class="name">
              <h3 class="title">Resultados de búsqueda</h3>
{{--               <h6>{{$product->category->name}}</h6> --}}
              <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
            </div>
            @if (session('notification'))
            <div class="alert alert-success" role="alert">
              {{ session('notification') }}
            </div>
            @endif
          </div>
        </div>
      </div>
      <div class="description text-center">
        <p>Se encontrarón {{$products->total()}} resultados para el término {{$query}}.</p>
      </div>
      <div class="team text-center">
        <div class="row">
          @foreach($products as $product)
          <div class="col-md-4">
            <div class="team-player">
              <div class="card card-plain ">
                <div class="col-md-6 ml-auto mr-auto ">
                  <img src="{{$product->featured_image_url}}" class="img-raised rounded-circle img-fluid" style="max-width: 200px; max-height: 200px">
                </div>
                <h4 class="card-title "><a href="{{url('/productos/'.$product->id)}}">{{$product->name}}</a>
                </h4>
                <div class="card-body">
                  <p class="card-description">{{$product->description}}</p>
                </div>
              </div>
            </div>
          </div>
          @endforeach  
        </div>
        <div class="text-center">
          {{$products->links()}}
          <br>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection




