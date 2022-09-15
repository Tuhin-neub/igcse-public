@extends('website.layouts.app')

@section('contents')

<!-- End full screen top nav-->
<div class="slider" id="top">
  <div class="wrap-header intro">
    <!-- Start slide-->
    <div class="slide bg-mask background-image full-vh" data-image="{{ asset('all/website/img/work.png') }}">
        <div class="container-slide vertical-align center small-text">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h1 class="heading-title-big">
                     take a look at our projects</h1>
                <div class="description-slide">
                  We create beautiful design & great user experience, to supply the best digital products for our clients.<br>As proof of this, here are our projects.
                </div>
                <div class="buttons-section">
                  <a class="smooth-scroll btn dark-btn large-btn" href="#portfolio">watch projects</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!--Buttont down-->
    <a class="smooth-scroll btn-down" href="#portfolio"><i class="fa fa-angle-down" aria-hidden="true"></i></a> 
  </div>
</div>

<!--Section our some work-->
<section class="section-portfolio bg-white-section background-image" id="portfolio" data-image="img/bg1.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-push-2">
        <div class="heading-title center">
          <h2>Our some <span>work</span></h2>
          <div class="small-desd">We create <span>awesome stuff</span></div>
          <p></p>
        </div>
        <div class="controls-portfolio center">
          <ul class="text-center" id="control-portfolio">
            <li class="filter select-cat active" id="liact" data-filter="*">All</li>
            <li class="filter" data-filter=".category-2">Design</li>
            <li class="filter" data-filter=".category-3">Wesbites</li>
            <li class="filter" data-filter=".category-4">Software</li>
            <li class="filter" data-filter=".category-5">Mobile App</li>
            <li class="filter" data-filter=".category-6">Events</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <!--Portfolio-->
      <div class="portfolio portfolio-items">
        <!-- Start Block item-->

        @foreach($portfolio as $row)
          <?php
            if ($row->category == 'Design') {
              $catz = 2;
            }elseif ($row->category == 'Websites') {
              $catz = 3;
            }elseif ($row->category == 'Software') {
              $catz = 4;
            }elseif ($row->category == 'Mobile App') {
              $catz = 5;
            }elseif ($row->category == 'Events') {
              $catz = 6;
            }
          ?>
        <!-- Start Block item-->
        <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 item-portfolio portfolio-item category-{{ $catz }}">
          <a class="image-modal-gallery" href="#modal-{{ $row->id }}" target="_blank" title="" data-toggle="modal" data-target=".modal1">
            <div class="item-wrap dh-container">
              <img src="{{ asset('storage/'.$row->cover_img) }}" alt="{{ $row->item_name }}" class="img-fluid">
              <div class="content dh-overlay">
                <div class="tizer-circle"><i class="fa fa-indent"></i></div>
                <div class="content-wrap">
                  <div class="content-va">
                    <h2>{{ $row->item_name }}</h2>
                    <p>{{ $row->item_type }}</p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <!-- details in modal-->
        <div class="modal-box mfp-hide" id="modal-{{ $row->id }}">
          <div class="slider-wrap gallery-slide">
            <div class="slider-portfolio">
              <div class="slide">
                <img class="img-responsive" src="{{ asset('storage/'.$row->cover_img) }}" alt="{{ $row->item_name }}">
              </div>
              <!-- <div class="slide"><img class="img-responsive" src="img/portfolio/cad-1.jpg" alt="work"></div>
              <div class="slide"><img class="img-responsive" src="img/portfolio/cad-3.jpg" alt="work"></div> -->
            </div>
            <!-- Strat Control carousel-->
            <!-- <div class="prev-next-block-rotate opacity-control" id="control-portfolio-slider">
              <div class="wrap-prev">
                <div class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
              </div>
              <div class="wrap-next">
                <div class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
              </div>
            </div> -->
            <!--Control sliders-->
            <div class="dots-control-carousel" id="dots-control-portfolio-slider"></div>
          </div>
          <div class="modal-box-content">
            <h2>{{ $row->category }} for <span>{{ $row->client_name }}</span></h2>
            <p>{{ $row->details }}</p>
            <hr>
            <h3>Detalis</h3>
            <ul class="list-project">
              <li><b>Client: </b>{{ $row->client_name }}</li>
              <li><b>Date: </b>{{ date("d-M-Y", strtotime("$row->project_date")) }}</li>
              <li><b>Live: </b><a href="{{ $row->live_link }}">View project<i class="fa fa-external-link" aria-hidden="true"></i></a></li>
            </ul>
            <hr>
            <div class="buttons-section center">
              <a class="btn accent-br-btn large-btn" href="{{ $row->live_link }}">See live project</a>
            </div>
          </div>
          <button class="mfp-close" title="Close (Esc)" type="button">×</button>
        </div>
        @endforeach
      </div>
      <!--End portfolio-->
    </div>
  </div>
</section>

<!-- Old browsers support-->
  <!--[if lt IE 9]>
<script src="libs/html5shiv/es5-shim.min.js"></script>
<script src="libs/html5shiv/html5shiv.min.js"></script>
<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
<script src="libs/respond/respond.min.js"></script>
<![endif]-->
  <br>
  <br>
  <br>
@endsection