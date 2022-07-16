<?php require_once("php/common/config.php");?>
<?php require_once("php/common/verification.php");?>

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
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

  </head>
  <body>

    <!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
    <div class="container">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="index.html">
        <img src="assets/images/logo.jpeg" alt="logo" />
          <span class="font-12 d-block font-weight-light">Online Library Solutions </span>
      </a>

      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" />
      </a>
    </div>

    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <ul class="navbar-nav mr-lg-2">
        <li class="nav-item nav-search d-none d-lg-block"></li>             
      </ul>

      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">

            <div class="nav-profile-img">
              <img src="assets/images/faces/face1.jpg" alt="image" />
            </div>

            <div class="nav-profile-text">
              <p class="text-black font-weight-semibold m-0">
                <?php echo $_SESSION["retfhtgj_name"]; ?> </p>
              <span class="font-13 online-color">online<!--  <i class="mdi mdi-chevron-down"> --></i></span>
            </div>
          </a>
        </li>
      </ul>

    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
  </div>
</nav>

<nav class="bottom-navbar">
<div class="container">
<ul class="nav page-navigation">
    
          
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <i class="fa fa-tachometer" aria-hidden="true"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
  
  <?php if($_SESSION["retfhtgj_user_type"] == "Admin" || ($_SESSION["retfhtgj_user_type"] == "librarian")) { ?>  
    <li class="nav-item">
      <a class="nav-link" href="users.php">
        <i class="fa fa-users" aria-hidden="true"></i>
        <span class="menu-title">Users</span>
      </a>
    </li>
    <?php } ?>
    
    <li class="nav-item">
      <a class="nav-link" href="categories.php">
        <i class="fa fa-list-alt" aria-hidden="true"></i>
        <span class="menu-title">Categories</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="books.php">
        <i class="fa fa-book" aria-hidden="true"></i>
        <span class="menu-title">Books</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="reservations.php">
        <i class="fa fa-tachometer" aria-hidden="true"></i>
        <span class="menu-title">Reservation</span>
      </a>
    </li>
  
  <?php if($_SESSION["retfhtgj_user_type"] == "Admin" || ($_SESSION["retfhtgj_user_type"] == "librarian")) { ?>   
    <li class="nav-item">
      <a class="nav-link" href="bookings.php">
        <i class="fa fa-ticket" aria-hidden="true"></i>
        <span class="menu-title">Bookings</span>
      </a>
    </li>
  <?php } ?>
   
    <li class="nav-item">
      <div class="nav-link d-flex">
        <a href="logout.php">
        <button class="btn btn-sm bg-danger text-white"> Log Out </button></a>
      </div>
    </li>            
  </ul>                        
</div>
</nav>
</div>

<!-- page body start point -->
<div class="container-scroller">
<div class="page_container">