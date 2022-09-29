@extends('website.layouts.app')

@section('contents')
<div class="container">
    <div class="row">
        <div class="col-sm-1 col-md-2 col-lg-3"></div>
        <div class="col-sm-10 col-md-8 col-lg-6 inner-login-form">
            <form method="POST" class="border bg-light p-3">
                <h3 class="text-center">Login Form</h3>
                <div class="input-group my-3">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                    <input type="text" class="form-control" placeholder="Email" aria-label="Email"
                        aria-describedby="basic-addon1">
                </div>

                <div class="input-group my-3">
                    <span class="input-group-text" id="basic-addon1">Password</span>
                    <input type="password" class="form-control" placeholder="Password" aria-label="Password"
                        aria-describedby="basic-addon1">
                </div>

                <div class="row mb-3 d-flex flex-row justify-content-center">
                    <button type="submit" class="btn btn-success col-3 col-sm-3 col-md-3">Submit</button>
                </div>
                <p class="text-dark text-center ">Do you want to sign up? <a href="registration_form.html"
                        class="text-primary" style="text-decoration: none;">Sign Up</a></p>
            </form>
        </div>
        <div class="col-sm-1 col-md-2 col-lg-3"></div>
    </div>
</div>
@endsection