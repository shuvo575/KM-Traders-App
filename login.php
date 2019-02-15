<?php session_start();
  require_once('functions/function.php');
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
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
</head>

<body class="login-page sidebar-collapse">
  <div class="page-header header-filter" style="background-image: url('./assets/img/bg2.jpg'); background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="post" action="form.php">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">K.M. Traders</h4>
              </div>
              <div class="card-body">
                <div class="col-md-5 ml-auto mr-auto">
                <img src="./assets/img/logoblack.png" alt="" class="img-raised rounded img-fluid">
              </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">
                  <input type="hidden" class="form-control" name="hidden" value="login">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" class="form-control" name="pass" placeholder="Password...">
                </div>
              </div>
              <br/>
              <div class="text-center">
                <button class="btn btn-primary btn-wd btn-lg">Log in</button>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php $oPageContent->get_footer(); ?>
