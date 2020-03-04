@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container">
  <div class="box"></div>
  <div class="container-forms">
    <div class="container-info">
      <div class="info-item">
        <div class="table">
          <div class="table-cell">
            <p>
              ¿Ya tiene una cuenta?
            </p>
            <div class="btn">
              Ingresar
            </div>
          </div>
        </div>
      </div>
      <div class="info-item">
        <div class="table">
          <div class="table-cell">
            <p>
            ¿No tienes una cuenta? 
            </p>
            <div class="btn">
              Registrar
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-form">
      <form method="POST" id="formLogin" action="{{ route('admin.login') }}">
        @csrf
        <div class="form-item log-in">
        <div class="table">
          <div class="table-cell">
            <input name="email" placeholder="email" type="email" autocomplete="off" require autofocus />
            <input name="password" placeholder="Contraseña" type="Password" autocomplete="off" require />
            
              @error('email')
              <div class="alert alert-warning" style="padding-left: 1em;">
                  <span class="invalid-feedback" style="margin-top: 2rem;" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              </div>
              @enderror
              @error('password')
              <div class="alert alert-warning" style="padding-left: 1em;">
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              </div>
              @enderror
            
            <div class="btn" onclick="submitForm();">Ingresar</div>
          </div>
        </div>
      </div>
      </form>
      
      <div class="form-item sign-up">
        <div class="table">
          <div class="table-cell">
            <input name="email" placeholder="Email" type="text" autocomplete="off" />
            <input name="name" placeholder="Usuario" type="text" autocomplete="off" />
            <input name="password" placeholder="Contraseña" type="Password"autocomplete="off" />
            <div class="btn">
              Registrar
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
