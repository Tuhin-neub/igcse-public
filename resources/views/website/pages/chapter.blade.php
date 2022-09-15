@extends('website.layouts.app')
@section('header-links')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection
@section('contents')
<div class="container">
        <h1 class="text-center">Chapter</h1>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 mt-5">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h3 class="accordion-header" id="headingOne">
                        <button class="accordion-button w-100" type="button" data-bs-toggle="collapse" data-bs-target="#chapterOne" aria-expanded="true" aria-controls="chapterOne">
                          Chapter 1
                        </button>
                    </h3>
                      <div id="chapterOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                          <p style="text-align: justify;"><a href="#" target="_blank">Lecture 01</a></p>

                          <p style="text-align: justify;"><a href="#" target="_blank">Lecture 02</a></p>

                          <p style="text-align: justify;"><a href="#" target="_blank">Lecture 03</a></p>

                        </div>
                      </div>
                    </div>


                    <div class="accordion-item">
                        <h3 class="accordion-header" id="headingTwo">
                          <button class="accordion-button collapsed w-100" type="button" data-bs-toggle="collapse" data-bs-target="#chapterTwo" aria-expanded="false" aria-controls="chapterTwo">
                            Chapter 2
                          </button>
                        </h3>
                        <div id="chapterTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <p style="text-align: justify;"><a href="#" target="_blank">Lecture 01</a></p>

                            <p style="text-align: justify;"><a href="#" target="_blank">Lecture 02</a></p>
                          </div>
                        </div>
                      </div>
                      

                      <div class="accordion-item">
                        <h3 class="accordion-header" id="headingTwo">
                          <button class="accordion-button collapsed w-100" type="button" data-bs-toggle="collapse" data-bs-target="#chapterThree" aria-expanded="false" aria-controls="chapterThree">
                            Chapter 2
                          </button>
                        </h3>
                        <div id="chapterThree" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <p style="text-align: justify;"><a href="#" target="_blank">Lecture 01</a></p>

                            <p style="text-align: justify;"><a href="#" target="_blank">Lecture 02</a></p>
                          </div>
                        </div>
                      </div>
                  </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

@endsection

@section('footer-links')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
        crossorigin="anonymous"></script>
@endsection