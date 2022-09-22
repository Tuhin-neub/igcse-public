@extends('website.layouts.app')

@section('contents')
<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-md-2 col-lg-2"></div>
            <div class="col-md-8 col-lg-8 registration-form">
                <form method="POST" action="{{ route('register') }}" class="border bg-light p-3 ">
                    @csrf
                    <h3 class="text-center">Registartion Form</h3>
                    <div class="input-group my-3">
                        <span class="input-group-text" id="basic-addon1">Name</span>
                        <input type="text" class="form-control {{($errors->first('name') ? "border border-danger" : "")}}"
                            name="name" placeholder="Enter Your Name">
                        @error('name')
                            <div class="text-danger mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group my-3">
                        <span class="input-group-text" id="basic-addon1">Email</span>
                        <input type="email" class="form-control {{($errors->first('email') ? "border border-danger" : "")}}"
                            name="email" placeholder="Enter Your Email">
                        @error('email')
                            <div class="text-danger mb-1">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="input-group my-3">
                        <span class="input-group-text" id="basic-addon1">Phone</span>
                        <input type="text" class="form-control {{($errors->first('phone') ? "border border-danger" : "")}}"
                            name="phone" placeholder="Enter Your Phone">
                        @error('phone')
                            <div class="text-danger mb-1">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="input-group my-3">
                        <span class="input-group-text" id="basic-addon1">Address</span>
                        <textarea class="form-control {{($errors->first('address') ? "border border-danger" : "")}}" name="address" rows="2"></textarea>
                        @error('address')
                            <div class="text-danger mb-1">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="input-group my-3">
                        <span class="input-group-text" id="basic-addon1">Password</span>
                        <input type="password" class="form-control {{($errors->first('password') ? "border border-danger" : "")}}"
                            name="password" placeholder="Enter Your Password">
                        @error('password')
                            <div class="text-danger mb-1">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="input-group my-3">
                        <span class="input-group-text" id="basic-addon1">Confirn Password</span>
                        <input type="password" class="form-control {{($errors->first('password_confirmation') ? "border border-danger" : "")}}"
                            name="password_confirmation" placeholder="Confirn Password">
                    </div>
    
                    <div class="row mb-3 d-flex flex-row justify-content-center">
                        <button type="submit" class="btn btn-success col-3 col-sm-3 col-md-3">Submit</button>
                    </div>
                    <p class="text-dark text-center ">Do you want to login? <a href="student_login.html"
                            class="text-primary" style="text-decoration: none;">Login</a></p>
                </form>
            </div>
            <div class="col-md-2 col-lg-2"></div>
        </div>
    </div>
@endsection