@extends('layouts.app')

@section('content')

<!-- Main Section-->
<section
class="mt-0 overflow-hidden  vh-100 d-flex justify-content-center align-items-center p-4">
<!-- Page Content Goes Here -->

<!-- Login Form-->
<div class="col col-md-8 col-lg-6 col-xxl-5">
    <div class="shadow-xl p-4 p-lg-5 bg-white">
        <h1 class="text-center fs-2 mb-5 fw-bold">Forgotten Password</h1>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <p class="text-muted">Please enter your email below and we will send you a secure link to reset your password.</p>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
              <label for="email" class="form-label">{{ __('Email Address') }}</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@email.com">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark d-block w-100 my-4">{{ __('Send Password Reset Link') }}</button>
        </form>
    </div>

</div>
<!-- / Login Form-->

<!-- /Page Content -->
</section>
<!-- / Main Section-->
@endsection
