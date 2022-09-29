@extends('website.layouts.app')
@section('contents')
<!--Left Section Part-->

<div class="container">
    <h3 class="text-center font-weight-normal">Student Profile Update</h3>
    <hr>
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <div class="left-section">
                <div class="col-12 profile-image">
                    <img class="img-fluid" src="images/profile-icon-png-910.png" alt="Profile Icon">
                </div>
                <div class="col-12 dashboard-item"><a href="student_dashboard.html">Dashboard</a></div>
                <div class="col-12 dashboard-item"><a href="student_profile_dashboard.html">Profile</a></div>
                <div class="col-12 dashboard-item"><a href="#">Course Information</a></div>
                <div class="col-12 dashboard-item"><a href="#">Logout</a></div>
            </div>
        </div>
        <div class="col-md-8 col-lg-8">
            <h3 class="text-center mt-2">Update Information</h3>
            <div class="right-section">
                <div class="row border bg-light">
                    <div class=" col-md-4 col-lg-4 image-upload-section ">
                        <p class="font-weight-bold text-center">
                            <label for="file" style="cursor: pointer;">Upload Image</label>
                        </p>
                        <p>
                            <img class="img-fluid profile-image" src="images/profile-icon-png-910.png" id="output" width="100%" />
                        </p>
                        <input type="file" accept="image/*" name="image" id="imgfile" onchange="loadFile(event)" style="width : 100%;">
                        <p>
                            <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;">
                        </p>
                    </div>
                    <div class="col-md-8 col-lg-8">
                        <form method="post" class="p-3 ">
                            <div class="input-group my-3">
                                <span class="input-group-text" id="basic-addon1">Name</span>
                                <input type="text" class="form-control" aria-label="Full Name" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group my-3">
                                <span class="input-group-text" id="basic-addon1">Email</span>
                                <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group my-3">
                                <span class="input-group-text" id="basic-addon1">Phone</span>
                                <input type="text" class="form-control" aria-label="Contact Number" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group my-3">
                                <span class="input-group-text" id="basic-addon1">Address</span>
                                <textarea class="form-control" id="basic-addon1" rows="2"></textarea>
                            </div>

                            <div class="row mb-3 ml-1 d-flex flex-row justify-content-between" style="float: right;">
                                <button type="submit" class="btn btn-success ">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="row border bg-light mt-3">
                    <div class="col-12">
                        <form method="post" class="p-3">
                            <h3 class="text-left">Update Password</h3>
                            <div class="input-group my-3">
                                <span class="input-group-text" id="basic-addon1">Old Password</span>
                                <input type="text" class="form-control" aria-label="Old Password" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group my-3">
                                <span class="input-group-text" id="basic-addon1">Confirn Password</span>
                                <input type="text" class="form-control" aria-label="New Password" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group my-3">
                                <span class="input-group-text" id="basic-addon1">Confirn Password</span>
                                <input type="text" class="form-control" aria-label="Confirm Password" aria-describedby="basic-addon1">
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