<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="robots" content="noindex,nofollow>
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/logoonwhite.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    K.M. Traders
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="./assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />
  <link href="./assets/css/jquery.dataTables.min.css" rel="stylesheet" />
  <link href="./assets/css/custom.css" rel="stylesheet" />
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
</head>

<body class="profile-page sidebar-collapse" style="background-image: url('./assets/img/bg2.jpg');">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <div class="logo-container">
	         <div class="logo">
	            <a href="index.php"> <img src="assets/img/logoonwhite.png"></a>
	          </div>
				</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="index.php" class="nav-link" rel="tooltip" title="" data-placement="bottom"   data-original-title="Go to Home page">
              <i class="material-icons">home</i> Home
            </a>
          </li>
          <li class="nav-item">
            <a href="customer.php" class="nav-link" rel="tooltip" title="" data-placement="bottom"   data-original-title="View Customers">
              <i class="material-icons">group</i> Customer
            </a>
          </li>
          <li class="nav-item">
            <a href="sales.php" class="nav-link" rel="tooltip" title="" data-placement="bottom"   data-original-title="Sales Report">
              <i class="material-icons">attach_money</i> Sales
            </a>
          </li>
          <li class="nav-item">
            <a href="shipment.php" class="nav-link" rel="tooltip" title="" data-placement="bottom"   data-original-title="Shipment Report">
              <i class="material-icons">local_shipping</i> Shipment
            </a>
          </li>
          <li class="nav-item">
            <a href="products.php" class="nav-link" rel="tooltip" title="" data-placement="bottom"   data-original-title="View Products">
              <i class="material-icons">shopping_cart</i> Products
            </a>
          </li>
          <li class="nav-item">
            <a href="user.php" class="nav-link" rel="tooltip" title="" data-placement="bottom"   data-original-title="User Details">
              <i class="material-icons">verified_user</i> <?php echo $_SESSION['username']; ?>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link" rel="tooltip" title="" data-placement="bottom"   data-original-title="Log Out">
              <i class="material-icons">power_settings_new</i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
