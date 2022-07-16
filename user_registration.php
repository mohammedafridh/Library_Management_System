<?php require_once("php/user_registration.php")?>

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

  <!-- page body start point -->
  <div class="container-scroller">
  <div class="page_container">

<div class="form-center">
<div class="col-6 grid-margin stretch-card">
<div class="card">
<div class="card-body">

<center>
  <h4 class="card-title">Register User</h4>
  <p class="card-description">Enter below details</p>
  <?php if(isset($sucessMsg)) { echo $sucessMsg; } ?>
</center>
      
<form class="forms-sample" method="post">
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" placeholder="Name"
      name="name" required/>
    </div>

     <div class="form-group">
      <label>Gender</label>
      <select class="form-control" name="gender" required>
        <option hidden>Select Gender</option>
        <option>Male</option>
        <option>Female</option>9
      </select>
    </div>

    <div class="form-group">
      <label>Contact Number</label>
      <input type="text" class="form-control" placeholder="Contact Number" 
      name="contact_number" required/>
      <?php if(isset($error_contact_number)) {echo $error_contact_number; } ?>
    </div>
    
    <div class="form-group">
      <label>User Type</label>
      <select class="form-control" onchange="getval(this);" 
      name="user_type" required/>
      <?php if(isset($$error_p_code)) {echo $$error_p_code; } ?>
      <?php if(isset($error_l_code)) {echo $error_l_code; } ?>
        <option hidden>Select User Type</option>
        <option value="student">Student</option>
        <option value="professor">Professor</option>
        <option value="librarian">Librarian</option>
      </select>
    </div>

    <script>
    function getval(sel)
    {
      var user_type = sel.options[sel.selectedIndex].value;
      
      if(user_type == "professor")
      {
        $('.professor').css("display","block");
      }
      if(user_type == "librarian")
      {
        $('.professor').css("display","none");
        $('.librarian').css("display","block");
      }
      if(user_type == "student")
      {
        $('.professor').css("display","none");
        $('.librarian').css("display","none");
      }
      if(user_type == "")
      {
        $('.professor').css("display","none");
        $('.librarian').css("display","none");
      }
    }
    </script>

    <div class="professor" style="display: none;">
      <div class="form-group">
        <label>Professor Code</label>
        <input type="text" class="form-control" placeholder="Professor Code"
        name="professor_code"/>
      </div>
    </div>

    <div class="librarian" style="display: none;">
      <div class="form-group">
        <label>Librarian Code</label>
        <input type="text" class="form-control"
        placeholder="Librarian Code" 
        name="librarian_code"/>
      </div>
    </div>

    <div class="form-group">
      <label>E-mail</label>
      <input type="text" class="form-control"  placeholder="Email" 
      name="email" required/>
      <?php if(isset($error_email)) { echo $error_email; } ?>
    </div>
   
    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control"  placeholder="Password" 
      name="password1" required/>
    </div>

    <div class="form-group">
      <label>Re-enter Password</label>
      <input type="password" class="form-control" placeholder="Re-enter Password" 
      name="password2" required/>
      <?php if(isset($errorMsg)) { echo $errorMsg; } ?>
    </div>

    <div>
      <button type="submit" class="btn btn-primary me-2" name="submit">Register</button>
    </div><br>

    <div>
      <p> Have an account? 
      <a href = "index.php"> Sign In </a></p>
    </div>
  </form>

  </div>
  </div>
  </div>
  </div>   
</div>

<?php require_once('footer.php');?>