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

  </head>
  <body>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
      <span class="mdi mdi-menu"></span>
    </button>
           
    <div class="nav-link d-flex">
      <button class="btn btn-sm bg-danger text-white"> Home </button>
    </div>

  <!-- page body start point -->
  <div class="container-scroller">
  <div class="page_container">

<div class="form-center">
<div class="col-4 grid-margin stretch-card">
<div class="card">
<div class="card-body">

  <div class="form-center">
  <h4 class="card-title">Bookings</h4></div>
  <center>
  <p class="card-description">Borrow / Reserve Books</p></center>

  <form class="forms-sample">
    <div class="form-group">
      <label>User Id</label>
      <input type="text" class="form-control"  placeholder="Enter User Id" />
    </div>
    <div class="form-group">
      <label>Book Id</label>
      <input type="text" class="form-control" placeholder="Enter Book Id" />
    </div>
     <div class="form-group">
      <label >Booking Type</label>
      <select class="form-control">
        <option hidden>Select Booking type</option>
        <option>Borrow</option>
        <option>Reserve</option>
      </select>
    </div>

    <div class="form-group">
      <label>Booking Date</label>
      <input type="date" class="form-control" placeholder="Enter Booking Date" />
    </div>

    <div class="form-group">
      <label>Return Date</label>
      <input type="date" class="form-control" placeholder="Enter Return Date" />
    </div>

    <center>
    <button type="submit" class="btn btn-primary me-2"> Confirm Booking </button>
  </center>
    
  </form>
</div>
</div>
</div>

<?php require_once('footer.php');?>