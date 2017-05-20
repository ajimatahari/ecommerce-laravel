
<!--  Top Navigation bar -->
  <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"> <img src="" alt="Logo image"> </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active"> <a class="nav-link" href="/home"> <i class="fa fa-home" aria-hidden="true"> Home</i> <span class="sr-only">(current)</span></a> </li>
        <li class="nav-item"> <a class="nav-link" href="/shop"> Shop </a> </li>
        <li class="nav-item"> <a class="nav-link" href="/cart"> <i class="fa fa-shopping-cart" aria-hidden="true"> Cart</i> <span class="badge badge-success badge-pill"> {{ Cart::count() }} </span> </a> </li>
        <li class="nav-item mr-0 ml-lg-auto"> <a class="nav-link" href="/contact"> Contact </a> </li>
      </ul>

      <ul class="navbar-nav ml-auto">
          @if (Auth::check())

                @if(Auth::user()->isAdmin())
                    <li> <a href="{{ route('admin') }}" class="btn btn-secondary"> DASHBOARD </a> </li>
                @endif
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle " href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <strong> Hello, {{  Auth::user()->name }}  </strong> </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('/address') }}"> Address details </a>
                            <a class="dropdown-item" href="{{ route('payment-details') }}"> Payment details </a>
                            <a class="dropdown-item" href=""> Wishlists </a>
                            <a class="dropdown-item" href="{{ route('user.orders') }}"> Orders placed </a>
                            <a class="dropdown-item" href="#"> Reviews </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"> Logout </a>
                          </div>
                    </li>

            @else
              <li> <a href="{{ route('login') }}" class="btn btn-secondary"> Login </a> </li>
          @endif

      </ul>
    </div>
  </nav>  <!-- /. end of navigation -->
