<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin View User</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="Invest, whale, USDT, mining, mining farm, proInvest, network marketing, internet marketing, crypto, bitcoin, ethereum, ethereum mining, liquidity, investment, portfolio, bitcoin investment, invest my bitcoin">
    <meta content="ProInvest is more than just a platform. We're a community of passionate crypto enthusiasts, united by the goal of building a *robust and thriving DeFi ecosystem.* Join us and be a part of the future of finance!
" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }} " rel="stylesheet">
    <link href="{{ asset( 'lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style_.css')}}" rel="stylesheet">

    <style>
    /* Optional: Custom styles */
    .search-container {
      display: flex;
      align-items: center;
      max-width: 400px;
      margin: 0 auto;
    }

    .search-input {
      flex: 1;
      border-top-right-radius: 0;
      border-bottom-right-radius: 0;
    }

    .search-btn {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;
    }
  </style>
</head>

<body>

<!-- Modal -->



    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h5 class="text-primary"><i class="fa fa-hashtag me-2"></i>ProInvest <br> Dashboard</h5>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('img/user-avatar-svgrepo-com.svg') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ session('user_name') }}</h6>
                        <span id="plan_user">{{ session('user_plan') }}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('control') }}" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                  <!--  <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>-->
                    <a href="{{ route('admin_users') }}" class="nav-item nav-link active"><i class="fa fa-users me-2"></i>Users</a>
                  
                    
                    <a href="{{ route('admin_deposits') }}" class="nav-item nav-link"><i class="fa fa-money-bill me-2"></i>Deposit</a>
                  

                    <a href="{{ route('admin_withdrawals') }}" class="nav-item nav-link"><i class="fa fa-money-bill me-2"></i>Withdrawals</a>
                  

                  <!--  <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>-->
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
              <!--  <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>-->
                <div class="navbar-nav align-items-center ms-auto">
                   <!--

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>


-->
                 <!--

   <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notifications</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end  border-0 rounded-md shadow-xl rounded-bottom m-0 notification-dropdown">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New Referral</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Wallet funded</h6>
                                <small>15 minutes ago</small>
                            </a>
                          
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>

-->
                    <div class="nav-item ">
                        <a href="#" class="nav-link " data-bs-toggle="">
                            <img class="rounded-circle me-lg-2" src="{{asset('img/user-avatar-svgrepo-com.svg') }}" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ session('user_name') }}</span>
                        </a>
                        
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->




            <!-- Sales Chart Start -->
          <!--  <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Worldwide Sales</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Salse & Revenue</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>-->
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-white  rounded p-4">
                   




 <!-- Recent Sales Start -->



 <div class="container-fluid pt-4 px-4">

 
 <div class="container mt-5">
 <form method="POST" action="{{ route('update_member') }}">
                    @csrf <!-- Laravel CSRF protection token -->

                      <!-- Display Form Errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<div class="mb-3" >
        <label for="inputField1" class="form-label">USER ID</label>
        <input type="text" class="form-control" id="id" name="id" value="{{ $view_user->id }}">
      </div>

      <div class="mb-3">
        <label for="inputField1" class="form-label">Name</label>
        <input type="text" class="form-control" id="inputField1" name="name" value="{{ $view_user->name }}">
      </div>
      <div class="mb-3">
        <label for="inputField2" class="form-label">Email</label>
        <input type="text" class="form-control" id="inputField2" name="email" value="{{ $view_user->email }}">
      </div>
      <div class="mb-3">
        <label for="inputField3" class="form-label">Phone</label>
        <input type="text" class="form-control" d="inputField3" name="phone" value="{{ $view_user->phone }}">
      </div>
      <div class="mb-3">
        <label for="inputField4" class="form-label">Referral Balance ($)</label>
        <input type="text" class="form-control" id="inputField4" name="ref" value="{{ $view_user->ref_balance }}">
      </div>
      <div class="mb-3">
        <label for="inputField5" class="form-label">Deposit Balance ($)</label>
        <input type="text" class="form-control" id="inputField5" name="deposit" value="{{ $view_user->deposit_balance }}">
      </div>

      <div class="mb-3">
        <label for="inputField5" class="form-label">ROI Balance ($)</label>
        <input type="text" class="form-control" id="inputField5" name="roi" value="{{ $view_user->balance }}">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>

 


                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


          
            <!-- Widgets End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">ProInvest</a>, All Right Reserved. 
                        </div>
                       <!-- <div class="col-12 col-sm-6 text-center text-sm-end">
                                Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        </div>-->
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset( 'lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset( 'lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset( 'lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{asset( 'lib/owlcarousel/owl.carousel.min.js') }"></script>
    <script src="{{ asset( 'lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset( 'lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset( 'lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset( 'js/main_.js') }}"></script>

   
</body>

</html>