@extends('website.layouts.app')

@section('contents')
<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-md-2 col-lg-2"></div>
        <div class="col-md-8 col-lg-8 registration-form">
            <form method="post" class="border bg-light p-3 ">
                <h3 class="text-center">Registartion Form</h3>
                <div class="input-group my-3">
                    <span class="input-group-text" id="basic-addon1">Full Name</span>
                    <input type="text" class="form-control" aria-label="Full Name" aria-describedby="basic-addon1">
                </div>
                <div class="input-group my-3">
                    <span class="input-group-text" id="basic-addon1">Username</span>
                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group my-3">
                    <span class="input-group-text" id="basic-addon1">Contact Number</span>
                    <input type="text" class="form-control" aria-label="Contact Number" aria-describedby="basic-addon1">
                </div>

                <div class="input-group my-3">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                    <input type="text" class="form-control" aria-label="Email" aria-describedby="basic-addon1">
                </div>

                <div class="input-group my-3">
                    <span class="input-group-text" id="basic-addon1">Address</span>
                    <textarea class="form-control" id="basic-addon1" rows="2"></textarea>
                </div>

                <div class="input-group my-3">
                    <span class="input-group-text" id="basic-addon1">Password</span>
                    <input type="text" class="form-control" aria-label="Password" aria-describedby="basic-addon1">
                </div>

                <div class="input-group my-3">
                    <span class="input-group-text" id="basic-addon1">Confirn Password</span>
                    <input type="text" class="form-control" aria-label="Confirm Password"
                        aria-describedby="basic-addon1">
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