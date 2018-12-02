@extends('layouts.default')
@section('page.title', 'Login')

@section('content')
<div class="container height-fixer py-5">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-md-4 mb-md-5">
            <h2 class="text-center">Login</h2>
                @include('partially.alerts.warning')
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">E-Mail Address</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="name@domain.com" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <a class="btn btn-link pl-md-0" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-block btn-primary">
                                Login
                            </button>
                        </div>
                    </div>
                    <div class="form-group mt-md-5 mt-2 text-center border-top pt-3">
                        Don't have an account? <a href="{{ route('register') }}">Register Now!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
