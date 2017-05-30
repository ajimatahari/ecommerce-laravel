@extends('layouts.main')

@section('title', ' | Home page')

@section('stylesheets')
    <style media="screen">
        .page-content {
          margin: 0 !important;
        }
        .jumbotron {
          margin-bottom: 0 !important;
        }
    </style>
@endsection

@section('content')


    <section id="home">
    </section>


  <section class"container-fluid" id="testimonials">
    <div class="container">
    <!--Section heading-->
    <h1 class="section-heading text-center"> CUSTOMER TESTIMONIALS </h1>

          <div class="row">
              <!--Carousel Wrapper-->
              <div id="multi-item-example" class="carousel testimonial-carousel slide carousel-multi-item wow fadeIn" data-ride="carousel">
<br>
                  <!--Controls-->
                  <div class="controls-top text-center">
                      <a class="btn-floating btn-small" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left fa-3x"></i></a>
                      <a class="btn-floating btn-small" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right fa-3x"></i></a>
                  </div>
                  <!--/.Controls-->
<br>
                  <!--Indicators-->
                  <ol class="carousel-indicators">
                      <li data-target="#multi-item-example" data-slide-to="0" class="active bg-success"></li>
                      <li data-target="#multi-item-example" data-slide-to="1" class="bg-success"></li>
                      <li data-target="#multi-item-example" data-slide-to="2" class="bg-success"></li>
                  </ol>
                  <!--/.Indicators-->

                  <!--Slides-->
                  <div class="carousel-inner" role="listbox">

                      <!--First slide-->
                      <div class="carousel-item active">
                          <!--First column-->
                          <div class="col-md-4">

                              <div class="testimonial">
                                  <!--Avatar-->
                                  <div class="avatar text-center">
                                      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(1).jpg" class="rounded-circle img-fluid">
                                  </div>
                                  <!--Content-->
                                  <h4 class="text-center">Anna Deynah</h4>
                                  <h5 class="text-center">Web Designer</h5>
                                  <p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur quae quaerat ad velit ab.</p>

                                  <!--Review-->
                                  <div class="orange-text">
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star-half-full"> </i>
                                  </div>
                              </div>

                          </div>
                          <!--/First column-->

                          <!--Second column-->
                          <div class="col-md-4 hidden-sm-down">
                              <div class="testimonial">
                                  <!--Avatar-->
                                  <div class="avatar">
                                      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(3).jpg" class="rounded-circle img-fluid">
                                  </div>
                                  <!--Content-->
                                  <h4>John Doe</h4>
                                  <h5>Web Developer</h5>
                                  <p><i class="fa fa-quote-left"></i> Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid.</p>

                                  <!--Review-->
                                  <div class="orange-text">
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                  </div>
                              </div>
                          </div>
                          <!--/Second column-->

                          <!--Third column-->
                          <div class="col-md-4 hidden-sm-down">
                              <div class="testimonial">
                                  <!--Avatar-->
                                  <div class="avatar">
                                      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(5).jpg" class="rounded-circle img-fluid">
                                  </div>
                                  <!--Content-->
                                  <h4>Abbey Clark</h4>
                                  <h5>Photographer</h5>
                                  <p><i class="fa fa-quote-left"></i> Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum.</p>

                                  <!--Review-->
                                  <div class="orange-text">
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star-o"> </i>
                                  </div>
                              </div>
                          </div>
                          <!--/Third column-->

                      </div>
                      <!--/.First slide-->

                      <!--Second slide-->
                      <div class="carousel-item">
                          <!--First column-->
                          <div class="col-md-4">

                              <div class="testimonial">
                                  <!--Avatar-->
                                  <div class="avatar">
                                      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(4).jpg" class="rounded-circle img-fluid">
                                  </div>
                                  <!--Content-->
                                  <h4>Blake Dabney</h4>
                                  <h5>Web Designer</h5>
                                  <p><i class="fa fa-quote-left"></i> Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid.</p>

                                  <!--Review-->
                                  <div class="orange-text">
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star-half-full"> </i>
                                  </div>
                              </div>

                          </div>
                          <!--/First column-->

                          <!--Second column-->
                          <div class="col-md-4 hidden-sm-down">
                              <div class="testimonial">
                                  <!--Avatar-->
                                  <div class="avatar">
                                      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(6).jpg" class="rounded-circle img-fluid">
                                  </div>
                                  <!--Content-->
                                  <h4>Andrea Clay</h4>
                                  <h5>Front-end developer</h5>
                                  <p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur quae quaerat ad velit ab.</p>

                                  <!--Review-->
                                  <div class="orange-text">
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                  </div>
                              </div>
                          </div>
                          <!--/Second column-->

                          <!--Third column-->
                          <div class="col-md-4 hidden-sm-down">
                              <div class="testimonial">
                                  <!--Avatar-->
                                  <div class="avatar">
                                      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(7).jpg" class="rounded-circle img-fluid">
                                  </div>
                                  <!--Content-->
                                  <h4>Cami Gosse</h4>
                                  <h5>Phtographer</h5>
                                  <p><i class="fa fa-quote-left"></i> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti.</p>

                                  <!--Review-->
                                  <div class="orange-text">
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star-o"> </i>
                                  </div>
                              </div>
                          </div>
                          <!--/Third column-->

                      </div>
                      <!--/.Second slide-->

                      <!--Third slide-->
                      <div class="carousel-item">
                          <!--First column-->
                          <div class="col-md-4">

                              <div class="testimonial">
                                  <!--Avatar-->
                                  <div class="avatar">
                                      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(8).jpg" class="rounded-circle img-fluid">
                                  </div>
                                  <!--Content-->
                                  <h4>Bobby Haley</h4>
                                  <h5>Web Developer</h5>
                                  <p><i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur quae quaerat ad velit ab.</p>

                                  <!--Review-->
                                  <div class="orange-text">
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                  </div>
                              </div>

                          </div>
                          <!--/First column-->

                          <!--Second column-->
                          <div class="col-md-4 hidden-sm-down">
                              <div class="testimonial">
                                  <!--Avatar-->
                                  <div class="avatar">
                                      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg" class="rounded-circle img-fluid">
                                  </div>
                                  <!--Content-->
                                  <h4>Elisa Janson</h4>
                                  <h5>Marketer</h5>
                                  <p><i class="fa fa-quote-left"></i> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti.</p>

                                  <!--Review-->
                                  <div class="orange-text">
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star-half-full"> </i>
                                  </div>
                              </div>
                          </div>
                          <!--/Second column-->

                          <!--Third column-->
                          <div class="col-md-4 hidden-sm-down">
                              <div class="testimonial">
                                  <!--Avatar-->
                                  <div class="avatar">
                                      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" class="rounded-circle img-fluid">
                                  </div>
                                  <!--Content-->
                                  <h4>Robert Jacobs</h4>
                                  <h5>Front-end developer</h5>
                                  <p><i class="fa fa-quote-left"></i> Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid.</p>

                                  <!--Review-->
                                  <div class="orange-text">
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star"> </i>
                                      <i class="fa fa-star-o"> </i>
                                  </div>
                              </div>
                          </div>
                          <!--/Third column-->

                      </div>
                      <!--/.Third slide-->

                  </div>
                  <!--/.Slides-->

              </div>
              <!--/.Carousel Wrapper-->
          </div>
      </section>



  </div>


@stop
