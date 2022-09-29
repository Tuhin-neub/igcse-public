@extends('website.layouts.app')
@section('contents')
<div class="container">
    <h3 class="text-center font-weight-normal">Student Dashboard</h3>
    <hr>
    <div class="row">
        @include('user.layouts.sidebar')
        <div class="col-md-8 col-lg-8">
            <div class="right-section">
                <div class="card-deck text-center">
                    <div class="card bg-success text-light">
                        <div class="card-body">
                            <h5 class="card-title">Chapter Completed</h5>
                            <p class="card-text">This is a wider card with supporting text</p>
                        </div>
                    </div>
                    <div class="card bg-primary text-light">
                        <div class="card-body">
                            <h5 class="card-title">lecture Completed</h5>
                            <p class="card-text">This is a wider card with supporting text</p>
                        </div>
                    </div>
                    <div class="card bg-info text-light">
                        <div class="card-body">
                            <h5 class="card-title">Obtained Marks</h5>
                            <p class="card-text">This is a wider card with supporting text</p>
                        </div>
                    </div>
                </div>

                <!--Table Start-->
                <table class="table table-bordered mt-4 text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Chapter</th>
                            <th scope="col">Lecture</th>
                            <th scope="col">Quiz</th>
                            <th scope="col">Point</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection