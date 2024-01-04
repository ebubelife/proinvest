<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="Invest, whale, USDT, mining, mining farm, proInvest, network marketing, internet marketing, crypto, bitcoin, ethereum, ethereum mining, liquidity, investment, portfolio, bitcoin investment, invest my bitcoin">
    <meta content="ProInvest is more than just a platform. We're a community of passionate crypto enthusiasts, united by the goal of building a *robust and thriving DeFi ecosystem.* Join us and be a part of the future of finance!
" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">



    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


   
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

   
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</small>
                <small class="ms-4"><i class="fa fa-clock text-primary me-2"></i>9.00 am - 9.00 pm</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small><i class="fa fa-envelope text-primary me-2"></i>info@example.com</small>
                <small class="ms-4"><i class="fa fa-phone-alt text-primary me-2"></i>+012 345 6789</small>
            </div>
        </div>

      <!-- add navbar -->
    @include('navbar') 
    </div>
 

   


   


    <!-- Callback Start -->
    <div class="container-fluid callback my-5 pt-5 bg-white">
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                   
            
            
            
                <form method="POST" action="{{ route('login_admin') }}">
                    @csrf <!-- Laravel CSRF protection token -->

                    <div class="bg-white border rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                             <h1 class="display-5 mb-5">Admin LOGIN</h1>

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

                            
                        </div>
                        <div class="row g-3">

                       
                          
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="mail" placeholder="Admin Email">
                                    <label for="mail">Admin Email</label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="password" id="subject" placeholder="Password">
                                    <label for="subject">Password</label>
                                </div>
                            </div>
                           
                            <div class="col-12 text-center">
                                <button class="btn btn-warning w-100 py-3" type="submit">Admin Login</button>
                            </div>
                        </div>
                    </div>

</form></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Callback End -->


   


    


       
    <!-- Footer -->


  
    @include('footer') 
</body>

</html>