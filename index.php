<?php require_once('php/index.php');?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Lowa State University</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_2/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="assets/css/my_style.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <!-- font styles -->
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Lobster&display=swap" rel="stylesheet">

  </head>
  <body>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
      <span class="mdi mdi-menu"></span>
    </button>

<!-- page body start point -->
<div class="container-scroller">
<div class="page_container">

<div class="form-center">
  <form method="post">  
    <div class="col-6 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">

    <center>
    <h4 style = "color:red;" class="font-lobster">Lowa State University</h4></center>
    <center>
    <p style= "color:blue;" class="card-description">Welcome</p>
    <!-- <form class="forms-sample"> -->
    </center>

      <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" placeholder="Email" 
        name="email"/>
      </div>
     
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" 
        name="password"/>
      </div>

      <p><?php if(isset($error)){ echo $error; } ?></p>

      <div class="form-center">
        <button type="submit" class="btn btn-primary me-2" name="login"> Log In </button>
      </div><br>

      <div>
        <p>Dont have an account?
        <a href = "user_registration.php"> Sign Up </a></p>
      </div>                    
  </form>
  </div>
  </div>
  </div> 

<?php require_once('footer.php');?>     