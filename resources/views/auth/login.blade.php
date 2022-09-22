@extends('website.layouts.app')

@section('contents')
<div class="container">
    <div class="row">
        <div class="col-sm-1 col-md-2 col-lg-3"></div>
            <div class="col-sm-10 col-md-8 col-lg-6 inner-login-form">
                <form method="POST" action="{{ route('login') }}" class="border bg-light p-3">
                    @csrf

                    <div class="input-group my-3">
                        <span class="input-group-text" id="basic-addon1">Email</span>
                        <input type="email" class="form-control {{($errors->first('name') ? "border border-danger" : "")}}" 
                            placeholder="Email" 
                            name="email">
                        @error('name')
                            <div class="text-danger mb-1">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="input-group my-3">
                        <span class="input-group-text" id="basic-addon1">Password</span>
                        <input type="password" class="form-control {{($errors->first('name') ? "border border-danger" : "")}}" 
                            placeholder="Password" 
                            name="password">
                        @error('password')
                            <div class="text-danger mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3 d-flex flex-row justify-content-center">
                        <button type="submit" class="btn btn-success col-3 col-sm-3 col-md-3">Submit</button>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </form>
            </div>
        <div class="col-sm-1 col-md-2 col-lg-3"></div>
    </div>
</div>
@endsection