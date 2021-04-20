<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <meta name="csrf-token" content="{{ csrf_token() }}"/>

  <title>
   @yield('title')
  </title>

  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/css/dataTables.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" integrity="sha512-f8gN/IhfI+0E9Fc/LKtjVq4ywfhYAVeMGKsECzDUHcFJ5teVwvKTqizm+5a84FINhfrgdvjX8hEJbem2io1iTA==" crossorigin="anonymous" />

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

<!--data tables-->
  <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <!--calander--->
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> --}}

<body>
  <!-- Sidenav -->

  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="{{'dashboard' == request()->path() ? 'active':'' }}">
              <a class="nav-link" href="/dashboard">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/booking">
                <i class="fas fa-key"></i>
                <span class="nav-link-text">Bookings</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/bookedroom">
                <i class="fas fa-tags"></i>
                <span class="nav-link-text">Booked Rooms</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/bookedhall">
                <i class="fas fa-glass-martini"></i>
                <span class="nav-link-text">Booked Halls</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/guest">
                <i class="far fa-user-circle"></i>
                <span class="nav-link-text">Guests</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="map.html">
                <i class="fas fa-utensils"></i>
                <span class="nav-link-text">Menus</span>
              </a>
            </li>
            <li class="{{'role-register' == request()->path() ? 'active':'' }}">
              <a class="nav-link" href="/role-register">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text"> User-Profile</span>
              </a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link" href="/fullcalendar">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span class="nav-link-text">Event Calander</span>
              </a>
            </li>

            <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
          
              <i class="fas fa-hotel"></i>
              <span class="nav-link-text">Hotel Configuration</span>
              </a>
              {{-- </li> --}}

              <div class="collapse show" id="navbar-examples">
                <ul class="nav nav-sm flex-column">

               <li class="{{'room-type' == request()->path() ? 'active':'' }}">
              <a class="nav-link " href="/roomtype">
                <img src="https://img.icons8.com/color/16/000000/booking.png"/>
                <span class="nav-link-text">Room Types</span>
              </a>
              <li class="{{'rooms' == request()->path() ? 'active':'' }}">
              <a class="nav-link " href="/rooms">
                <img src="https://img.icons8.com/officexs/16/000000/booking.png"/>
                <span class="nav-link-text">Rooms</span>
              </a>
              <a class="nav-link " href="/halltype">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Hall Types</span>
              </a>
              <a class="nav-link " href="/hall">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Halls</span>
              </a>
              <a class="nav-link " href="/pricemanager">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Price Manager</span>
              </a>
              <a class="nav-link " href="/paidservices">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Paid Services</span>
              </a>
              <a class="nav-link " href="/coupanmagement">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Coupon Management</span>
              </a>
              <a class="nav-link " href="/floor">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Floors</span>
              </a>
              <a class="nav-link " href="/amenity">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Amenities</span>
              </a>
              <a class="nav-link " href="/housekeepingstatus">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Housekeeping Status</span>
              </a>

            </ul>
              </div>
            </li>
            {{-- </li>
            <li class="nav-item"> --}}
            
            
            
            <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
          
          <i class="fas fa-hotel"></i>
          <span class="nav-link-text">HR Management</span>
          </a>
              
              <div class="collapse show" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
              <a class="nav-link " href="/employee">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Emloyee</span>
              </a>
              <a class="nav-link " href="/department">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Department</span>
              </a>
              <a class="nav-link " href="/designation">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Designation</span>
              </a>
</div>

              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        
                <i class="fas fa-hotel"></i>
                <span class="nav-link-text">Reports</span>
                </a>
                <div class="collapse show" id="navbar-examples">
                  <ul class="nav nav-sm flex-column">
                <a class="nav-link " href="/employee">
                  <i class="ni ni-bullet-list-67 text-default"></i>
                  <span class="nav-link-text">Occupancy</span>
                </a>
                <a class="nav-link " href="/department">
                  <i class="ni ni-bullet-list-67 text-default"></i>
                  <span class="nav-link-text">Guest</span>
                </a>
                <a class="nav-link " href="/designation">
                  <i class="ni ni-bullet-list-67 text-default"></i>
                  <span class="nav-link-text">Financial</span>
                </a>
                <a class="nav-link " href="/designation">
                  <i class="ni ni-bullet-list-67 text-default"></i>
                  <span class="nav-link-text">Coupan</span>
                </a>
                <a class="nav-link " href="/designation">
                  <i class="ni ni-bullet-list-67 text-default"></i>
                  <span class="nav-link-text">Expenses</span>
                </a>



                  </ul>
                </div>

                <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        
                  <i class="fas fa-hotel"></i>
                  <span class="nav-link-text">CMS</span>
                  </a>


                  <div class="collapse show" id="navbar-examples">
                    <ul class="nav nav-sm flex-column">
                  <a class="nav-link " href="/employee">
                    <i class="ni ni-bullet-list-67 text-default"></i>
                    <span class="nav-link-text">Pages</span>
                  </a>
                  <a class="nav-link " href="/department">
                    <i class="ni ni-bullet-list-67 text-default"></i>
                    <span class="nav-link-text">Banners</span>
                  </a>
                  <a class="nav-link " href="/designation">
                    <i class="ni ni-bullet-list-67 text-default"></i>
                    <span class="nav-link-text">Gallery</span>
                  </a>
                  <a class="nav-link " href="/designation">
                    <i class="ni ni-bullet-list-67 text-default"></i>
                    <span class="nav-link-text">Coupan</span>
                  </a>
                  <a class="nav-link " href="/designation">
                    <i class="ni ni-bullet-list-67 text-default"></i>
                    <span class="nav-link-text">Expenses</span>
                  </a>
  
                    </ul>
                  </div>

                  
                <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">    
                  <i class="fas fa-hotel"></i>
                  <span class="nav-link-text">Administrative</span>
                  </a>
                  <div class="collapse show" id="navbar-examples">
                    <ul class="nav nav-sm flex-column">
                  <a class="nav-link " href="/employee">
                    <i class="ni ni-bullet-list-67 text-default"></i>
                    <span class="nav-link-text">Settings</span>
                  </a>
                  <a class="nav-link " href="/department">
                    <i class="ni ni-bullet-list-67 text-default"></i>
                    <span class="nav-link-text">Languages</span>
                  </a>
                  <a class="nav-link " href="/designation">
                    <i class="ni ni-bullet-list-67 text-default"></i>
                    <span class="nav-link-text">Currency</span>
                  </a>
                  <a class="nav-link " href="/designation">
                    <i class="ni ni-bullet-list-67 text-default"></i>
                    <span class="nav-link-text">Locations</span>
                  </a>
                  <a class="nav-link " href="/designation">
                    <i class="ni ni-bullet-list-67 text-default"></i>
                    <span class="nav-link-text">Tax Manager</span>
                  </a>
                  <a class="nav-link " href="/designation">
                    <i class="ni ni-bullet-list-67 text-default"></i>
                    <span class="nav-link-text">Testimonials</span>
                  </a>
                    </ul>
                  </div>

            <li class="nav-item">
              <a class="nav-link" href="upgrade.html">
                <i class="ni ni-send text-dark"></i>
                <span class="nav-link-text">Upgrade</span>
              </a>

              
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentation</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Getting started</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
                <i class="ni ni-palette"></i>
                <span class="nav-link-text">Foundation</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
                <i class="ni ni-ui-04"></i>
                <span class="nav-link-text">Components</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Plugins</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

<div class="main-content" id="panel">
  <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center  ml-md-auto ">
          <li class="nav-item d-xl-none">
            <!-- Sidenav toggler -->
            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </div>
          </li>
          <li class="nav-item d-sm-none">
            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
              <i class="ni ni-zoom-split-in"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ni ni-bell-55"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
              <!-- Dropdown header -->
              <div class="px-3 py-3">
                <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
              </div>
              <!-- List group -->
              <div class="list-group list-group-flush">
                <a href="#!" class="list-group-item list-group-item-action">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                    </div>
                    <div class="col ml--2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h4 class="mb-0 text-sm">John Snow</h4>
                        </div>
                        <div class="text-right text-muted">
                          <small>2 hrs ago</small>
                        </div>
                      </div>
                      <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                    </div>
                  </div>
                </a>
                <a href="#!" class="list-group-item list-group-item-action">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg" class="avatar rounded-circle">
                    </div>
                    <div class="col ml--2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h4 class="mb-0 text-sm">John Snow</h4>
                        </div>
                        <div class="text-right text-muted">
                          <small>3 hrs ago</small>
                        </div>
                      </div>
                      <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                    </div>
                  </div>
                </a>
                <a href="#!" class="list-group-item list-group-item-action">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg" class="avatar rounded-circle">
                    </div>
                    <div class="col ml--2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h4 class="mb-0 text-sm">John Snow</h4>
                        </div>
                        <div class="text-right text-muted">
                          <small>5 hrs ago</small>
                        </div>
                      </div>
                      <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                    </div>
                  </div>
                </a>
                <a href="#!" class="list-group-item list-group-item-action">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg" class="avatar rounded-circle">
                    </div>
                    <div class="col ml--2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h4 class="mb-0 text-sm">John Snow</h4>
                        </div>
                        <div class="text-right text-muted">
                          <small>2 hrs ago</small>
                        </div>
                      </div>
                      <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                    </div>
                  </div>
                </a>
                <a href="#!" class="list-group-item list-group-item-action">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <!-- Avatar -->
                      <img alt="Image placeholder" src="../assets/img/theme/team-5.jpg" class="avatar rounded-circle">
                    </div>
                    <div class="col ml--2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h4 class="mb-0 text-sm">John Snow</h4>
                        </div>
                        <div class="text-right text-muted">
                          <small>3 hrs ago</small>
                        </div>
                      </div>
                      <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                    </div>
                  </div>
                </a>
              </div>
              <!-- View all -->
              <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ni ni-ungroup"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
              <div class="row shortcuts px-4">
                <a href="#!" class="col-4 shortcut-item">
                  <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                    <i class="ni ni-calendar-grid-58"></i>
                  </span>
                  <small>Calendar</small>
                </a>
                <a href="/contact" class="col-4 shortcut-item" id="contactid">
                  <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                    <i class="ni ni-email-83"></i>
                  </span>
                  <small>Email</small>
                </a>
                <a href="#!" class="col-4 shortcut-item">
                  <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                    <i class="ni ni-credit-card"></i>
                  </span>
                  <small>Payments</small>
                </a>
                <a href="#!" class="col-4 shortcut-item">
                  <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                    <i class="ni ni-books"></i>
                  </span>
                  <small>Reports</small>
                </a>
                <a href="/map" class="col-4 shortcut-item">
                  <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                    <i class="ni ni-pin-3"></i>
                  </span>
                  <small>Maps</small>
                </a>
                <a href="#!" class="col-4 shortcut-item">
                  <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                    <i class="ni ni-basket"></i>
                  </span>
                  <small>Shop</small>
                </a>
              </div>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                </span>
                <div class="media-body  ml-2  d-none d-lg-block">
                  {{-- <span class="mb-0 text-sm  font-weight-bold">John Snow</span> --}}
                </div>
              </div>
            </a>
             <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          {{-- <h6 class="h2 text-white d-inline-block mb-0">Tables</h6> --}}
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>


  <!-- Page content -->
  <!-- <div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class=" col ">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Register Roles</h3>
          </div>
          <div class="card-body"> -->

           <!-- Main content -->



         <div class="main-content" id="panel">

            @yield('content')
        </div>
    <!-- Topnav -->
      </div>
      <!-- Footer -->
  <footer class="footer pt-0">
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
  <script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="{{ asset('assets/js/dataTables.min.js')}}"></script>
  
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  

  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
  
   <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script> 
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


  <script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!--summer note-->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>




<!--sweet alert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- data tables-->	
 <script src ="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>



<!---------calander----------------->
 {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  --}}
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" />
  
 <script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>
  
 <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>



 @yield('scripts')
 </body>

