@extends('website.layouts.app')
@section('contents')
<!--Left Section Part-->

<div class="container">
    <h3 class="text-center font-weight-normal">Student Profile Update</h3>
    <hr>
    <div class="row">
        @include('user.layouts.sidebar')
        <div class="col-md-8 col-lg-8">
            <h3 class="text-center mt-2">Update Information</h3>
            <div class="right-section">
                <form class="row border bg-light" method="post" action="{{ route('user.profile-update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class=" col-md-4 col-lg-4 image-upload-section ">
                        <p class="font-weight-bold text-center">
                            <label for="file" style="cursor: pointer;">Upload Image</label>
                        </p>
                        <p>
                            <img id="avatar" class="img-fluid profile-image" src="{{ Auth::user()->avatar ? asset('storage/'.Auth::user()->avatar) : asset('all/website/images/profile.png') }}" id="output" width="100%" />
                        </p>
                        <input type="file" accept="image/*" name="avatar" id="imgfile" 
                            onchange="document.getElementById('avatar').src = window.URL.createObjectURL(this.files[0])" 
                            style="width : 100%;">
                        <input type="hidden" value="{{ Auth::user()->avatar ? Auth::user()->avatar : '' }}" name="old_avatar">
                    </div>
                    <div class="col-md-8 col-lg-8">
                        <div method="post" class="p-3 ">
                            <div class="input-group my-3">
                                <span class="input-group-text" id="basic-addon1">Name</span>
                                <input type="text" class="form-control {{($errors->first('name') ? "border border-danger" : "")}}"
                                    name="name" placeholder="Enter Your Name" value="{{ Auth::user()->name ? Auth::user()->name : old('name') }}">
                                @error('name')
                                    <div class="text-danger mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group my-3">
                                <span class="input-group-text" id="basic-addon1">Email</span>
                                <input type="email" class="form-control {{($errors->first('email') ? "border border-danger" : "")}}"
                                    name="email" placeholder="Enter Your Email"  value="{{ Auth::user()->email ? Auth::user()->email : old('email') }}">
                                @error('email')
                                    <div class="text-danger mb-1">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="input-group my-3">
                                <span class="input-group-text" id="basic-addon1">Phone</span>
                                <input type="text" class="form-control {{($errors->first('phone') ? "border border-danger" : "")}}"
                                    name="phone" placeholder="Enter Your Phone" value="{{ Auth::user()->phone ? Auth::user()->phone : old('phone') }}">
                                @error('phone')
                                    <div class="text-danger mb-1">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <div class="input-group my-3">
                                <span class="input-group-text" id="basic-addon1">Address</span>
                                <textarea class="form-control {{($errors->first('address') ? "border border-danger" : "")}}" 
                                    name="address" rows="2"
                                    placeholder="Enter Your Address">{{ Auth::user()->address ? Auth::user()->address : old('address') }}</textarea>
                                @error('address')
                                    <div class="text-danger mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3 ml-1 d-flex flex-row justify-content-between" style="float: right;">
                                <button type="submit" class="btn btn-success ">Update</button>
                            </div>

                        </div>
                    </div>
                </form>
                <div class="row border bg-light mt-3">
                    <div class="col-12">
                        <form method="post" action="{{ route('user.password-update') }}" class="p-3">
                            @csrf
                            <h3 class="text-left">Update Password</h3>
                            <div class="input-group my-3">
                                <span class="input-group-text" id="basic-addon1">Current Password</span>
                                <input type="password" class="form-control {{($errors->first('current_password') ? "border border-danger" : "")}}" 
                                    placeholder="Enter Your Current Password"
                                    name="current_password">
                                @error('current_password')
                                    <div class="text-danger mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group my-3">
                                <span class="input-group-text" id="basic-addon1">New Password</span>
                                <input type="password" class="form-control {{($errors->first('new_password') ? "border border-danger" : "")}}" 
                                    placeholder="Enter New Password"
                                    name="new_password">
                                @error('new_password')
                                    <div class="text-danger mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group my-3">
                                <span class="input-group-text" id="basic-addon1">Confirm Password</span>
                                <input type="password" class="form-control {{($errors->first('new_confirm_password') ? "border border-danger" : "")}}" 
                                    placeholder="Enter New Password"
                                    name="new_confirm_password">
                                @error('new_confirm_password')
                                    <div class="text-danger mb-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="row mb-3 ml-1 d-flex flex-row justify-content-between">
                                <button type="submit" class="btn btn-success">Update password</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection