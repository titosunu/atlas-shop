@extends('layouts.app')

@section('content')

    <section class="mt-0 overflow-hidden  vh-100 d-flex justify-content-center align-items-center p-4 mt-5">

        <div class="col col-md-8 col-lg-6 col-xxl-5">

                    <div class="shadow-xl p-4 p-lg-5 bg-white">
                    <h1 class="text-center fw-bold mb-5 fs-2">Login</h1>
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="form-group">

                                <label class="form-label" for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email" placeholder="name@email.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="form-group">

                                <label for="password" class="form-label d-flex justify-content-between align-items-center">
                                    {{ __('Password') }}
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-muted small">{{ __('Forgot Your Password?') }}</a>
                                    @endif
                                </label>
                                <input id="password" type="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>

                        <div class="form-check">
                            <input class="form-check-input border-dark" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <button type="submit" class="btn btn-dark d-block w-100 my-4">{{ __('Login') }}</button>

                    </form>

                    <p class="d-block text-center text-muted">New customer? <a class="text-muted" href="{{ route('register') }}">Sign up for an account</a></p>
                    </div>

        </div>
    </section>
@endsection
