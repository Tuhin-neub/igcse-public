@extends('website.layouts.app')

@section('header-links')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.6/assets/owl.carousel.min.css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection

@section('contents')
<!--Left part Start-->
<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-12">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner owl-carousel">
                    <div class="carousel-item active">
                        <img class="d-block w-100 img-fluid" src=" {{ asset('all/website/images/image1.jpg')}} " alt="First slide">
                    </div>
                    <div class="carousel-item active">
                        <img class="d-block w-100 img-fluid" src="{{ asset('all/website/images/image1.jpg')}}" alt="Second slide">
                    </div>
                </div>
                <div id="counter"></div>
            </div><br>
            <div class="social-icon d-flex justify-content-end">
                <span class="mr-2">
                    <a href="#">Facebook</a>
                </span>
                <span class="mr-2">
                    <a href="#">Twitter</a>
                </span>
                <span>
                    <a href="#">YouTube</a>
                </span>
            </div>
            <hr>
            <h2>Lecture Title</h2>
            <p class="lecture-content py-2 px-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta
                voluptas reprehenderit consequatur veniam doloremque ea error, autem sequi, placeat nobis molestias,
                ab quo corrupti ullam repellendus officiis aperiam eos! Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Nam soluta voluptas reprehenderit consequatur veniam doloremque ea error, autem
                sequi, placeat nobis molestias, ab quo corrupti ullam repellendus officiis aperiam eos! Lorem ipsum
                dolor sit amet consectetur adipisicing elit. Nam soluta voluptas reprehenderit consequatur veniam
                doloremque ea error, autem sequi, placeat nobis molestias, ab quo corrupti ullam repellendus
                officiis aperiam eos! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam soluta voluptas
                reprehenderit consequatur veniam doloremque ea error, autem sequi, placeat nobis molestias, ab quo
                corrupti ullam repellendus officiis aperiam eos! Lorem ipsum dolor sit amet consectetur adipisicing
                elit. Nam soluta voluptas reprehenderit consequatur veniam doloremque ea error, autem sequi, placeat
                nobis molestias, ab quo corrupti ullam repellendus officiis aperiam eos! Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Nam soluta voluptas reprehenderit consequatur veniam doloremque ea
                error, autem sequi, placeat nobis molestias, ab quo corrupti ullam repellendus officiis aperiam eos!
            </p>
            <hr>

            <div class="row pagination-section">
                <div class="col-4">
                    <a href="#">Previous</a>
                </div>
                <div class="col-4 py-2 complete bg-success">
                    <a href="#quiz-section">Complete</a>
                </div>
                <div class="col-4 next">
                    <a href="#">Next</a>
                </div>
            </div>
        </div>
        <!--Left part End-->
    </div>
</div>
@endsection

@section('footer-links')
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.6/owl.carousel.min.js'>
</script>
<script src="{{ asset('all/website/Js/script.js')}}"></script>
@endsection