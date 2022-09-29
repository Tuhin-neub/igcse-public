@extends('website.layouts.app')

@section('header-links')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
@endsection

@section('contents')
<!--About us section Start-->
<div class="container about-us mt-5 pt-5">
    <div class="w-100 text-center text-uppercase">
        <h1>About Us</h1>
    </div>
    <div class="border rounded p-2 my-2">
        <div class="row">
            <div class="col-md-6">
                <div class="w-100">
                    <img class="w-100" src="{{ empty($about_us) ? asset('no-image.png') : asset('storage/'.$about_us->image) }}" alt="about img">
                </div>
            </div>
            <div class="col-md-6">
                <div class="w-100 text-justify">
                    {!! empty($about_us) ? old('details') : $about_us->details !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!--About us section End-->
@endsection


@section('footer-links')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
@endsection