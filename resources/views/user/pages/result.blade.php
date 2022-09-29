@extends('website.layouts.app')
@section('contents')
<div class="col-sm-2"></div>
<div class="col-12" style="margin-top: 70px">
    <!--Quiz Section Start-->
    <div class="container">
        <h1 class="text-center my-2">Hi, {{ Auth::user()->name }}</h1>
        
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h6 class="text-center">Chapter: {{ $lecture->chapter->title }}</h6>
                <p class="text-center">lecture: {{ $lecture->title }}</p>
                <h6 class="text-center my-2">Your result is.</h6>
                <h6>Total Correct : {{ $data->total_correct }}</h6>
                <h6>Total Wrong : {{ $data->total_wrong }}</h6>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <!--Quiz Section End-->
</div>
@endsection

@section('footer-links')

@endsection