@extends('layouts.app')
@section('body-class','login-page sidebar-collapse')
@section('content')
<div class="page-header header-filter" style="background-image: url('{{asset('img/bg7.jpg')}}'); background-size: cover; background-position: top center;">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 ml-auto mr-auto">
        <div class="card card-login col-md-11">
          @if ($errors->any)
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="card-header card-header-primary text-center">
              <h4 class="card-title">Registro</h4>
                {{-- <div class="social-line">
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-facebook-square"></i>
                </a>
                <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-google-plus"></i>
                </a>
              </div> --}}
            </div>
            <p class="description text-center">Completa tus datos</p>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">face</i>
                      </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nombre..." name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">fingerprint</i>
                      </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Usuario..." name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">phone</i>
                      </span>
                    </div>
                    <input type="number" class="form-control" placeholder="Teléfono..." name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                  </div>
                </div>
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">class</i>
                  </span>
                </div>
                <input type="text" class="form-control" placeholder="Dirección..." name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">mail</i>
                  </span>
                </div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Correo Electrónico..." value="{{ old('email') }}" autocomplete="email" autofocus>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input id="password" placeholder="Contraseña..." type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input placeholder="Confirmar Contraseña..." type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Confirmar Registro</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
{{--   @include('includes.footer') --}}
</div>
@endsection
