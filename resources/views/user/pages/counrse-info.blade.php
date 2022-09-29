@extends('website.layouts.app')
@section('contents')
<div class="container">
    <h3 class="text-center font-weight-normal">Student Dashboard</h3>
    <hr>
    <div class="row">
        @include('user.layouts.sidebar')
        <div class="col-md-8 col-lg-8">
            <div class="right-section">
                <div class="card-deck">
                    <div class="card">
                        <img class="card-img-top" src="images/Card 1.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Chapter title</h5> <br>
                            <span class="card-text">Lecture Title</span><br>
                            <span class="card-text">Obtained marks</span> <br>
                            <span class="card-text">Status</span> <br>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="images/Card 3.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Chapter title</h5> <br>
                            <span class="card-text">Lecture Title</span> <br>
                            <span class="card-text">Obtained marks</span> <br>
                            <span class="card-text">Status</span> <br>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="images/image1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Chapter title</h5> <br>
                            <span class="card-text">Lecture Title</span> <br>
                            <span class="card-text">Obtained marks</span> <br>
                            <span class="card-text">Status</span> <br>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection