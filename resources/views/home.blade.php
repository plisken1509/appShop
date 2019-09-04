@extends('layouts.app')
@section('title', config('app.name'). ' | Dashboard')

@section('body-class','profile-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section">
      <h2 class="title  text-center" >Dashboard</h2>
      @if (session('notification'))
      <div class="alert alert-success" role="alert">
        {{ session('notification') }}
      </div>
      @endif

      <ul class="nav nav-pills nav-pills-icons" role="tablist">
    <!--
        color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
      -->
      <li class="nav-item">
        <a class="nav-link active show" href="#dashboard-1" role="tab" data-toggle="tab">
          <i class="material-icons">dashboard</i>
          Carrito de Compras
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
          <i class="material-icons">list</i>
          Pedidos Realizados
        </a>
      </li>
    </ul>
    <hr>
    <p>Tienes {{auth()->user()->cart->details->count()}} productos en tu carrito de compras</p>
    <table class="table" >
      <thead>
       <th class="text-center" WIDTH="50" HEIGHT="50">#</th>
       <th WIDTH="50" HEIGHT="50">Nombre</th>
       <th class="cold-md-2 text-center">Precio</th>
       <th class="cold-md-2 text-center">Cantidad</th>
       <th class="cold-md-2 text-center">Subtotal</th>
       <th class="text-center">Opciones</th>
     </thead>
     <tbody>
      @foreach(auth()->user()->cart->details as $detail)
      <tr>
        <th class="text-center">
          <img src="{{$detail->product->featured_image_url}}" height="100">
        </th>
        <td>
          <a href="{{url('/products/'.$detail->product->id)}}" target="_blank"></a>{{$detail->product->name}}
        </td>
        <td class="text-center">&euro; {{$detail->product->price}}</td>
        <td class="text-center">{{$detail->quantity}}</td>
        <td class="text-center">$ {{$detail->quantity * $detail->product->price}}</td>
        <td class="td-actions text-center">
          <form method="post" action="{{url('/cart')}}">
            @csrf
            @method('DELETE')
            <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
            <a href="{{url('/productos/'.$detail->product->id)}}" target="_blank" rel="tooltip" title="Ver Producto" class="btn btn-primary btn-simple btn-link btn-info btn-xs{{-- btn btn-success btn-simple btn-xs --}}">
              <i class="fa fa-info"></i>
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
    <div class="text-center">
        <form action="{{url('/order')}}" method="post">
            @csrf
            <button class="btn btn-primary btn-round">
              <i class="material-icons">done</i> Revisar pedido
            </button>
        </form>
    </div>
</div>
</div>
</div>
@endsection




