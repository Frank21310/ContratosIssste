@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card border-0 shadow-lg my-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="text-center">
                                    <img src="{{ asset('assets/img/logo_gob.png') }}" alt="Logo" width="240"
                                        height="auto" class="my-5 mb-1">
                                </div>
                                <div class="text-center">
                                    <img src="{{ asset('assets/img/logo_issste_nuevo.png') }}" alt="Logo" width="245"
                                        height="auto" class="mb-5 ">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h3 mb-3">Iniciar Sesion</h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}" >
                                        @csrf
                                        <div class="form-group">
                                            <label for="email"
                                                class=" col-form-label text-md-end">{{ __('Corrreo Institucional') }}</label>
                                            <input id="email" type="email" placeholder="correo@correo.com"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password"
                                                class="col-form-label text-md-end">{{ __('Contraseña') }}</label>
                                            <input id="password" placeholder="Contraseña.." type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group p-2">
                                            <div class="custom-control custom-checkbox small">
                                                <input class="custom-control-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="custom-control-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-4 col-6 mx-auto py-3">
                                            <button type="submit" class="btn btn-outline-dark BotonRojo ">
                                                {{ __('Iniciar Sesion') }}
                                            </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
