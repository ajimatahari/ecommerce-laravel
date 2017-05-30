
<!--  Top Navigation bar -->
  <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"> <img src="" alt="Logo image"> </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item {{ Request::is('home') ? 'active' : '' }}"> <a class="nav-link" href="/home"> <i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a> </li>
        <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}"> <a class="nav-link" href="/shop"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shop </a></li>
        <li class="nav-item {{ Request::is('cart') ? 'active' : '' }}"> <a class="nav-link" href="/cart"> <i class="fa fa-shopping-basket" aria-hidden="true"></i> Cart <span class="badge badge-success badge-pill"> {{ Cart::count() }} </span> </a> </li>
        <li class="nav-item  {{ Request::is('contact') ? 'active' : '' }}"> <a class="nav-link" href="/contact"> <i class="fa fa-commenting" aria-hidden="true"></i> Contact </a></li>
      </ul>

      <!-- Notification area -->
      {{-- <ul class="navbar-nav navbar-right">
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle " href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <strong><i class="fa fa-bell"></i>
                  Notifications <span class="badge badge-pill badge-lg badge-success"> {{ count(Auth::user()->unreadNotifications) }} </span>  </strong>
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @foreach (Auth::user()->unreadNotifications as $notification)
                    @include('layouts.notifications.' . snake_case(class_basename($notification->type)))
                @endforeach
              </div>
        </li>
      </ul> <!-- end of Notification --> --}}

      <ul class="navbar-nav ml-auto">
          @if (Auth::check())
                @if(Auth::user()->isAdmin())
                    <li> <a href="{{ route('admin') }}" class="btn btn-secondary"> DASHBOARD </a> </li>
                @endif
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle " href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <strong> Hello, {{  Auth::user()->name }}  </strong> </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('/address') }}"> Address details </a>
                            <a class="dropdown-item" href="{{ route('cards.index') }}"> Payment details </a>
                            <a class="dropdown-item" href=""> Wishlists </a>
                            <a class="dropdown-item" href="{{ route('user.orders') }}"> Orders placed </a>
                            <a class="dropdown-item" href="{{ route('user.reviews') }}"> Reviews </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"> Logout </a>
                          </div>
                    </li>

            @else
                <li> <a href="{{ route('register') }}" class="btn btn-secondary btn-block"> Register </a> </li>
                <li> <a href="{{ route('login') }}" class="btn btn-secondary btn-block"> Login </a> </li>

          @endif

      </ul>
    </div>
  </nav>  <!-- /. end of navigation -->
