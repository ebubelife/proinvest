<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ProInvest - Unlock Passive Returns with USDT Liquidity Mining</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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
 

   


   


   <!-- PlANS HERE -->


   
   <div class="container my-3 my-sm-5 pricing-plans">
      <h1 class="mb-3 mb-sm-5 text-center">Investment Plans</h1>
      <div class="row">
        <div class="col-12 col-md-4 mb-4">
          <div class="card card-outline-success text-center">
            <div class="card-header  text-white">
              <h2>Standard Server</h2>
              
            </div>
            <div class="card-block">
              <p class="card-text text-left my-2 text-center">
              <b>BNB-ETH-SOL mining.</b>

              </p>
            </div>
            <ul class="list-group small">
              <li class="list-group-item">Minimum deposit of 300-4000 USDT </li>
              <li class="list-group-item">Monthly ROI 8%</li>
              <li class="list-group-item">APY 96-156%</li>
              <li class="list-group-item">Investment Valid for 60 Days</li>
              <li class="list-group-item">Daily withdrawal 10$ USDT.</li>
              <li class="list-group-item">Deposit is fully Returned after 90 days investment period</li>
            </ul>
            <div class="card-footer">
            <a href="{{ route('register') }}" type="button" class="btn btn-default btn-lg">
                Select
</a>
             </div>
          </div>
        </div>
        <div class="col-12 col-md-4 mb-4">
          <div class="card card-outline-warning text-center">
            <div class="card-header  text-white">
              <h2>Professional Server</h2>
              <!--<h4>₹700 / year</h4>-->
            </div>
            <div class="card-block">
              <p class="card-text text-left my-2 text-center">
              BITCOIN, ETH, Solana, Avalanche mining.
              </p>
            </div>
            <ul class="list-group small">
              <li class="list-group-item">Minimum deposit of 4100-9900 USDT</li>
              <li class="list-group-item">Monthly ROI 10%</li>
              <li class="list-group-item">APY 103-156%</li>
              <li class="list-group-item">Investment Valid for 60 Days</li>
              <li class="list-group-item">Daily withdrawal 15$ USDT</li>
              <li class="list-group-item">Deposit is fully Returned after 90 days investment period</li>
            </ul>
            <div class="card-footer">
            <a href="{{ route('register') }}" type="button" class="btn btn-default btn-lg">
                Select
</a>
           </div>
          </div>
        </div>
        <div class="col-12 col-md-4 mb-4">
          <div class="card card-outline-danger text-center">
            <div class="card-header  text-white">
              <h2>Elite Server:</h2>
              
            </div>
            <div class="card-block">
              <p class="card-text text-left my-2 text-center">
              BITCOIN, ETH, BNB
              </p>
            </div>
            <ul class="list-group small">
              <li class="list-group-item">Minimum deposit of 10000 - 30000 USDT</li>
              <li class="list-group-item">Monthly ROI 15</li>
              
              <li class="list-group-item">APY 120-156%</li>
              <li class="list-group-item">Investment Valid for 60 Days</li>
              <li class="list-group-item">Daily withdrawal 25 USDT</li>
              <li class="list-group-item">Deposit is fully Returned after 90 days investment period</li>
            </ul>
            <div class="card-footer">
            <a href="{{ route('register') }}" type="button" class="btn btn-default btn-lg">
                Select
</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row">

      <div class="col-12 col-md-4 mb-4">
          <div class="card card-outline-danger text-center">
            <div class="card-header  text-white">
              <h2>DEX Server: (Pancake Swap)</h2>
              
            </div>
            <div class="card-block">
              <p class="card-text text-left my-2 text-center">
              BNB Liquidity Mining
              </p>
            </div>
            <ul class="list-group small">
              <li class="list-group-item">Minimum deposit of 250 BNB</li>
              <li class="list-group-item">Daily Withdrawal 0.4 BNB</li>
              
              <li class="list-group-item">Investment Valid for 120 Days</li>
            
              <li class="list-group-item">Deposit is fully Returned after 120 days investment period</li>
             
            </ul>
            <div class="card-footer">
            <a href="{{ route('register') }}" type="button" class="btn btn-default btn-lg">
                Select
</a>
            </div>
          </div>
        </div>
      


        <div class="col-12 col-md-4 mb-4">
          <div class="card card-outline-danger text-center">
            <div class="card-header  text-white">
              <h2>PRO DEX Server: (UNISWAP)</h2>
              
            </div>
            <div class="card-block">
              <p class="card-text text-left my-2 text-center">
              ETHEREUM  Liquidity Mining
              </p>
            </div>
            <ul class="list-group small">
              <li class="list-group-item">Minimum deposit of 25 ETH</li>
              <li class="list-group-item">Daily Withdrawal 0.2 ETH</li>
              
              <li class="list-group-item">Investment Valid for 120 Days</li>
            
              <li class="list-group-item">Deposit is fully Returned after 120 days investment period</li>
             
            </ul>
            <div class="card-footer">
            <a href="{{ route('register') }}" type="button" class="btn btn-default btn-lg">
                Select
</a>
            </div>
          </div>
        </div>
      

</div>

      
    </div>
    

    


     <!-- Footer -->


  
     @include('footer') 
</body>



</html>