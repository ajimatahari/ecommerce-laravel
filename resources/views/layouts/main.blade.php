<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ecommerce App @yield('title') </title>

        <!-- Bootstrap CSS cdn link-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

        <!-- FontAwesome icons cdn link -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Local style sheet file -->
        <link href="{{ asset('css/main.css') }}" media="all" rel="stylesheet" type="text/css">

    		<!-- Load other css files -->
    		@yield('stylesheets')

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Top navigation bar -->
        @include('layouts._nav')

        <div class="jumbotron jumbotron-fluid jumbotron-top">
          <div class="container">
            <h1 class="display-1 text-center">E-commerce App</h1>

            <p class="lead text-center">Relly excited for this e-commerce web app developed using Laravel 5.4. Stay tuned for more!</p>
          </div>
        </div>

        <!-- Page custom content -->


            <!-- Display session flash messages -->
            <div class="container">
                @include('layouts._messages')
            </div>
            <div class="page-content">
              @yield('content')
          </div>

        <!-- Get started div -->
        <div class="container-fluid">
          <div class="row get-started">
            <div class="col-md-4 offset-md-2">
              <p>
                <h2> Get started with our E-commerce App </h2>
              </p>
            </div>

            <div class="col-md-5 mx-auto">
                <a href="{{ route('register') }}" class="btn btn-success btn-lg"> Create an account </a>
            </div>

          </div>
        </div>

        <!-- end of get started -->

        <!-- Page footer content -->
        <footer>
          <div class="jumbotron jumbotron-fluid jumbotron-footer">
            <div class="container col-md-8 offset-md-3">
              <div class="row">
                    <div class="col-md-4">
                        <div class="col-md-2 offset-md-2"><a href="#"><i class="fa fa-phone fa-5x fa-success" aria-hidden="true"></i> </a></div>
<br>
                        <p>Feel a bit lost? Give us a call.</p>
                    </div>

                    <div class="col-md-4">
                      <p><strong> Second category </strong></p>
                      <ul>
                        <li>Lorem</li>
                        <li>Lorem ipsum</li>
                        <li>Lorem ipsum</li>
                      </ul>
                    </div>

                    <div class="col-md-4">
                      <p><strong> Third category </strong></p>
                      <ul>
                        <li>Lorem</li>
                        <li>Lorem ipsum</li>
                        <li>Lorem ipsum</li>
                      </ul>
                    </div>
              </div>

            </div>
          </div>

          <div class="copy">
            <p class="lead text-center"> Designed by Andrei Hribanas &copy 2017</p>
          </div>
        <footer><!-- end of footer -->


        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

        <!-- Load Stripe.js payment handler -->
        <script src="https://js.stripe.com/v2/"></script>
        <script src="https://js.stripe.com/v3/"></script>


        <!-- Load other internal or custom script files. -->
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')

    </body>
</html>
