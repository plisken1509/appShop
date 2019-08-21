@extends('layouts.app')
@section('title', 'Bienvenido a App Shop')

@section('body-class','landing-page sidebar-collapse')
@section('styles')
  <style>
      .team .row .col-md-4{
        margin-bottom: 5em;
      }
      .row {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display:         flex;
  flex-wrap: wrap;
}
.row > [class*='col-'] {
  display: flex;
  flex-direction: column;
}
  </style>
@endsection
@section('content')
   <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Bienvenidos a su tienda online</h1>
          <h4>Realiza pedidos en línea y te contactaremos para coordinar la entrega</h4>
          <br>
          <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-play"></i> ¿Como funciona?
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">¿Por qué App Shop?</h2>
            <h5 class="description">Puedes Revisar nuestra relación completa de productos, comparar precios y realizar tus pedidos cuando estes seguro</h5>
          </div>
        </div>
        <div class="features">
          <div class="row">
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-info">
                  <i class="material-icons">chat</i>
                </div>
                <h4 class="info-title">Atendemos tus dudas</h4>
                <p>Atendemos rápidamente cualquier consulta que tengas vía chat. No estás sólo, sino que siempre estamos atentos a tus inquietudes.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-success">
                  <i class="material-icons">verified_user</i>
                </div>
                <h4 class="info-title">Pago Seguro</h4>
                <p>Todo pedido que realices será confirmado a través de una llamada. Si no confias en los pagos en línea puedes pagar contra entrega el valor acordado</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-danger">
                  <i class="material-icons">fingerprint</i>
                </div>
                <h4 class="info-title">Información privada</h4>
                <p>Los pedidos que realices sólo los conocerás tú a través de tu panel de usuario. Nadie más tiene acceso a esta información</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section text-center">
        <h2 class="title">Productos Disponibles</h2>
        <div class="team">
          <div class="row">
          @foreach($productos as $producto)
            <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <img src="{{$producto->featured_image_url}}" class="img-raised rounded-circle img-fluid" style="max-width: 200px; max-height: 200px">
                  </div>
                  <h4 class="card-title"><a href="{{url('/productos/'.$producto->id)}}">{{$producto->name}}</a>
                    <br>
                    <small class="card-description text-muted">{{$producto->category->name}}</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description">{{$producto->description}}</p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach  
          </div>
          <div class="text-center">
            {{$productos->links()}}
          </div>
        </div>
      </div>
      <div class="section section-contacts">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title">¿Aún no te has registrado</h2>
            <h4 class="text-center description">Regístrate ingresando tus datos básicos, y podrás realizar tus pedidos a través de nuestro carrito de compras. Si aún no te decides, de todas formas, con tu cuenta de usuario podrás hacer todas tus consultas sin compromiso</h4>
            <form class="contact-form" method="post" action="">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input name="name" class="form-control" value="{{old('name')}}">
                    {!!$errors->first('name','<small>:message</small><br>')!!}<br>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Correo electrónico</label>
                    <input type="text" name="email" class="form-control" value="{{old('email')}}">
                    {!!$errors->first('email','<small>:message</small><br>')!!}<br>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Asunto...</label>
                    <input name="subject" class="form-control" value="{{old('subject')}}">
                    {!!$errors->first('email','<small>:message</small><br>')!!}
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleMessage" class="bmd-label-floating">Tu mensaje</label>
                <textarea name="content" class="form-control" rows="4">{{old('content')}}</textarea>
                {!!$errors->first('content','<small>:message</small><br>')!!}<br>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto tex-center">
                  <button class="btn btn-primary btn-round">
                    <i class="material-icons">done</i> Enviar Consulta
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
