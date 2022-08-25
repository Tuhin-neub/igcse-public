@extends('website.layouts.app')

@section('contents')
<header>

    <!--Caurosal Start-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('all/website/images/image1.jpg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('all/website/images/image1.jpg')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('all/website/images/image1.jpg')}}" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--Carousel Ends-->
</header>

<!-- background Image Section Start-->
<div class="container bg-image-section mt-2">
    <div class="chapter-div text-uppercase">
        <ul class="list-group  w-100  text-dark">
            <li class="list-group-item chapter-bg">
                <a href="single page.html" target="_blank">Category 1</a>
            </li>
            <li class="list-group-item chapter-bg">
                <a href="single page.html" target="_blank">Category 2</a>
            </li>
            <li class="list-group-item chapter-bg">
                <a href="single page.html" target="_blank">Category 3</a>
            </li>
            <li class="list-group-item chapter-bg">
                <a href="single page.html" target="_blank">Category 4</a>
            </li>
            <li class="list-group-item chapter-bg">
                <a href="single page.html" target="_blank">Category 5</a>
            </li>

        </ul>
    </div>
</div>
<!--background Image Section End -->

<!--About us section Start-->
<div class="container about-us mt-2">
    <div class="w-100 text-center text-uppercase">
        <h1>About Us</h1>
    </div>
    <div class="border rounded p-2 my-2">
        <div class="row">
            <div class="col-md-6">
                <div class="w-100">
                    <img class="w-100" src="{{ asset('all/website/images/image1.jpg')}}" alt="about img">
                </div>
            </div>
            <div class="col-md-6">
                <div class="w-100 text-justify">
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when
                        looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of letters, as opposed to using 'Content here, content here', making it look like
                        readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                        default model text, and a search for 'lorem ipsum' will uncover many web sites still in their
                        infancy.
                    </p>
                </div>
            </div>

    </div>
    </div>
</div>
<!--About us section End-->

<!--Card Section Start -->
<div class="container my-2">
    <div class="w-100 text-center text-uppercase">
        <h1>Recent Lecture</h1>
    </div>
    <div class="row">
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="{{ asset('all/website/images/Card1.png')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="{{ asset('all/website/images/Card1.png')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional
                        content.
                    </p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="{{ asset('all/website/images/Card1.png')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This card has even longer content than the first to show that equal height
                        baction.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Card Section End -->

<!--Second Card Section Start-->
<div class="container my-3">
    <div class="row">
        <div class="card-deck">
            <div class="card col-md-6">
            
                <img class="card-img-top" src="{{ asset('all/website/images/Card3.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card col-md-6">
                <img class="card-img-top" src="{{ asset('all/website/images/Card3.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional
                        content.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Second Card Section End-->

<!--Contact us Section Start-->
<div class="container my-4">
    <div class="w-100 text-center text-uppercase">
        <h1>Contact us</h1>
    </div>
    <form>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Your Name">
            </div>
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Your Email">
            </div>
            <div class="form-group col-md-4">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" placeholder="Email Subject">
            </div>
        </div>
        <div class="form-group">
            <label for="comment">Message</label>
            <textarea class="form-control" rows="5" id="comment"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Send</button>
    </form>
</div>
<!--Contact us Section End-->
@endsection