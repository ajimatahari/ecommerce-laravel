@extends('layouts.main')

@section('content')

  <div class="container-fluid">
      <div class="row">

            <!-- Admin dashboard panel -->
            <div class="col-md-2 admin-sidebar">

              <h4 class="text-center"><i class="fa fa-home" aria-hiddent="true"> <strong> ADMIN DASHBOARD </strong> </i></h4>
                <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/admin/index"> Stats overview </a> <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/admin/users"> Users </a> <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/admin/products"> Products </a> <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/admin/categories"> Categories</a> <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/admin/orders"> Orders </a> <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/admin/messages"> Messages </a><div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/admin/reviews"> Reviews </a><div class="dropdown-divider"></div>
                  <a class="dropdown-item" href=""> Reports </a>
                <div class="dropdown-divider"></div>
            </div> <!-- end of admin dashboard panel -->

            <!-- Content page -->
            <div class="col-md-10">

              @yield('admin-content')
            </div> <!-- end of admin dashboard panel -->

      </div>
  </div>


@endsection
