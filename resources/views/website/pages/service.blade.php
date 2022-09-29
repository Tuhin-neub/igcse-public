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
                     take a look at our services</h1>
                  <div class="description-slide">We create beautiful design & great user experience, to supply the best digital products for our clients. <br>As proof of this, here are our projects.</div>
                  <div class="buttons-section"><a class="smooth-scroll btn dark-btn large-btn" href="#services">watch services</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Buttont down--><a class="smooth-scroll btn-down" href="#services"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
      </div>
    </div>
    <!--Section our services-->
    <section class="section-our-services bg-dark-section" id="services">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-push-2">
            <div class="heading-title center">
              <h2>Our <span>services</span></h2>
              <div class="small-desd">We create <span>awesome stuff</span></div>
              <p>The combination of beautiful and clean design, technology and user experience, give us big advantage in the market and differentiates our work.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="item-service">
            <div class="col-md-3 icon-service bg-mask background-image" data-image="{{ asset('all/website/img/s-01.jpg') }}">
              <div class="small-i"><i class="pe-7s-display1"></i></div>
              <div class="large-i"><i class="pe-7s-display1"></i></div>
            </div>
            <div class="col-md-9 content-service">
              <h2>Software <span>Development</span></h2>
              <p>We deliver custom web, mobile and desktop software solutions that broadly fall under 3 main categories – management of B2B, B2C interactions and internal operations. Our software confidently works across all popular browsers, OSes and mobile platforms, scales to millions of users and delivers immaculate UX through a clear, logical layout and smooth workflows. </p>               <hr>
              <div class="buttons-section left"><a class="btn white-btn" href="contact">Get started</a></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="item-service">
            <div class="col-md-3 icon-service bg-mask background-image" data-image="{{ asset('all/website/img/s-02.jpg') }}">
              <div class="small-i"><i class="pe-7s-global"></i></div>
              <div class="large-i"><i class="pe-7s-global"></i></div>
            </div>
            <div class="col-md-9 content-service">
              <h2>Website <span>Development</span></h2>
              <p>We create custom web design and development. With the aim to take on the challenge of providing the best and professional website design service, and guiding our clients in Web associated Matters, we have entered the highly competent web industry. We have a goal to offer service on personalized and friendly terms. We are desirous of developing long-lasting and mutually beneficial relationships with clients, and device strategies which ensure their success. <hr>
              <div class="buttons-section left"><a class="btn white-btn" href="contact">Get started</a></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="item-service">
            <div class="col-md-3 icon-service bg-mask background-image" data-image="{{ asset('all/website/img/s-03.jpg') }}">
              <div class="small-i"><i class="pe-7s-phone"></i></div>
              <div class="large-i"><i class="pe-7s-phone"></i></div>
            </div>
            <div class="col-md-9 content-service">
              <h2>Mobile  <span>Application</span></h2>
              <p> We develop mobile applications for Android and iOS. Mobile applications as part of corporate IT systems. Design and implementation of comprehensive business workflows. High-load applications. </p> <hr>
              <div class="buttons-section left"><a class="btn white-btn" href="contact">Get started</a></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="item-service">
            <div class="col-md-3 icon-service bg-mask background-image" data-image="{{ asset('all/website/img/s-04.jpg') }}">
              <div class="small-i"><i class="pe-7s-vector"></i></div>
              <div class="large-i"><i class="pe-7s-vector"></i></div>
            </div>
            <div class="col-md-9 content-service">
              <h2>Graphic<span>Design</span></h2>
              <p> Dessein Lab provides high-quality graphic design services to the clients within the minimum period. We offer our busy entrepreneurs and professionals the ability to get more work done in less time. That means to impressing your clients or selling lots of products on your business, we've got the knowledge, experience, and expert hands to provide what types of graphic design you may need. </p>
              <hr>
              <div class="buttons-section left"><a class="btn white-btn large-btn" href="contact">Get started</a></div>
            </div>
          </div>
        </div>
        
         <div class="row">
          <div class="item-service">
            <div class="col-md-3 icon-service bg-mask background-image" data-image="{{ asset('all/website/img/s-05.jpg') }}">
              <div class="small-i"><i class="pe-7s-way"></i></div>
              <div class="large-i"><i class="pe-7s-way"></i></div>
            </div>
            <div class="col-md-9 content-service">
              <h2>IT & Freelancing <span>Training</span></h2>
              <p>Our Dessein Lab, along with its digital solutions, has started another wing named Dessein Lab IT Institute to transform human resources, predominantly youth to skilled professionals to improve lives & change people’s working patterns by providing outsourcing training to make a huge impact on National revenue from earning online. To believe in a borderless world with equal
opportunities for everyone, Our target is to bridge the gap
between global and local marketplace and skill gapping in the
middle of Supply and demand with providing our affordable skill
development IT courses. </p>
              <hr>
              <div class="buttons-section left"><a class="btn white-btn large-btn" href="contact">Get started</a></div>
            </div>
          </div>
        </div>
        
      </div>
    </section>
    <!--Section work progress-->
    <section class="section-work-progress background-image bg-white-section white-90" data-image="{{ asset('all/website/img/bg1.jpg') }}">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="heading-title small-heading text-left">
              <h2>Work <span>progress</span></h2>
              <p>From idea to deployment we always work as a team to progress our project.</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-4">
            <div class="icon-progress"><i class="pe-7s-comment"></i>
              <p>1. Discuss</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-4">
            <div class="icon-progress"><i class="pe-7s-display2"></i>
              <p>2. Make</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-4">
            <div class="icon-progress"><i class="pe-7s-like"></i>
              <p>3. Product</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Section chooce us acc-->
    <section class="chooce-us-acc bg-dark-section background-image" data-image="{{ asset('all/website/img/bg3.jpg') }}">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="heading-title small-heading text-left">
              <h2>Why chooce  <span>us ?</span></h2>
              <p>It’s our attention to the small stuff, scheduling of timelines and keen project management that makes us stand out from the rest. We are creative, while keeping a close eye on the calendar and your budget.</p>
              <p>We bring our diverse background of advertising, design, branding, public relations, research and strategic planning to work for your company. Not only will your materials look great – they will get results.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="accordion">
              <!--tab-->
              <h3> <i class="fa fa-group"></i>We are proffesionals</h3>
              <div>
                <p>We have an experienced team who are very talented and they are so professional. We maintain high quality works for our clients .</p>
              </div>
              <!--tab-->
              <h3> <i class="fa fa-clock-o"></i>We are punctual</h3>
              <div>
                <p>We always complete our task in time. We work whole day and night to deliver any project in time.  </p>
              </div>
              <!--tab-->
              <h3><i class="fa fa-heart"></i>We are friendly</h3>
              <div>
                <p>We are so friendly to our client. Our clients can easily share their problems with us. We solve each and every problem with friendly behaviour. .</p>
              </div>
              <!--tab-->
              <h3> <i class="fa fa-codepen"></i>We are creative</h3>
              <div>
                <p>We have some creative designers who  always think out of the box and bring new ideas to make everything user friendly. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Section trigger-->
    <section class="section-trigger bg-white-section white-70 background-image" data-image="{{ asset('all/website/img/bg3.jpg') }}">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="heading-title small-heading center">
              <h2>Like our <span>services ?</span></h2>
            </div>
            <div class="buttons-section center"><a class="btn accent-btn large-btn" href="#">Start project</a></div>
          </div>
        </div>
      </div>
    </section>

@endsection