@extends('website.layouts.app')
@section('contents')
<div class="container">
    <h3 class="text-center font-weight-normal">Student Dashboard</h3>
    <hr>
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <div class="left-section">
                <div class="col-12 profile-image">
                    <img class="img-fluid" src="{{asset('all/website/images/profile.png')}}" alt="Profile Icon">
                </div>
                <div class="col-12 dashboard-item"><a href="student_dashboard.html">Dashboard</a></div>
                <div class="col-12 dashboard-item"><a href="student_profile_dashboard.html">Profile</a></div>
                <div class="col-12 dashboard-item"><a href="#">Course Information</a></div>
                <div class="col-12 dashboard-item"><a href="#">Logout</a></div>
            </div>
        </div>
        <div class="col-md-8 col-lg-8">
            <div class="right-section">

            </div>

        </div>
    </div>
</div>
@endsection