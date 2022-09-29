@extends('website.layouts.app')
@section('contents')
<<<<<<< Updated upstream
<!--Contact us Section Start-->
<div class="container mt-5 pt-5">
    <div class="w-100 text-center text-uppercase">
        <h1>Contact us</h1>
    </div>
    <form action="{{ route('contact-us-submit') }}" method="Post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="name">Name</label>
                <input type="text" class="form-control {{($errors->first('name') ? "border border-danger" : "")}}" 
                    id="name" name="name" placeholder="Your Name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" class="form-control {{($errors->first('email') ? "border border-danger" : "")}}" 
                    id="email" name="email" placeholder="Your Email" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger mb-1">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="subject">Subject</label>
                <input type="text" class="form-control {{($errors->first('subject') ? "border border-danger" : "")}}" 
                    id="subject" name="subject" placeholder="Email Subject" value="{{ old('subject') }}">
                    @error('subject')
                        <div class="text-danger mb-1">{{ $message }}</div>
                    @enderror

            </div>
        </div>
        <div class="form-group">
            <label for="comment">Message</label>
            <textarea class="form-control {{($errors->first('message') ? "border border-danger" : "")}}" 
                rows="5" name="message" id="comment">{{ old('message') }}</textarea>
                @error('message')
                    <div class="text-danger mb-1">{{ $message }}</div>
                @enderror
        </div>
        <button type="submit" class="btn btn-success">Send</button>
    </form>
</div>
<!--Contact us Section End-->
@endsection