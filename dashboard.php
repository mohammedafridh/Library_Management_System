<!-- calling header.php -->
<?php require_once('header.php'); ?>

<?php require_once('php/dashboard.php');?>

<!-- forms start here -->
<!-- <div class="form-center"> -->
<div class="row">
<div class="col-3 grid-margin stretch-card mrgn">
<div class="card">
<div class="card-body frm-img">
<!-- display profile -->
<center>
  <h4 style="color: blue;" class="card-title">Profile</h4>
  <p style="color: #4A235A;" class="card-description">Profile Details</p>
  <p class="success_msg"><?php if(isset($sucessMsg)){echo $sucessMsg;}?></p>
  <?php if(isset($error_password)){echo $error_password;}?>
</center>     
<form class="forms-sample" method="post">    
      <?php if(!isset($eid)) { ?>
      <div class="form-group">
      <label>E-mail</label>
      <p class="text-black font-weight-semibold m-0" value="email">
                <?php echo $_SESSION["retfhtgj_email"]; ?> </p>
    </div>
    
    <div class="form-group">
      <label>User Type</label>
      <p class="text-black font-weight-semibold m-0">
                <?php echo $_SESSION["retfhtgj_user_type"]; ?> </p>
    </div>
  <?php } ?>

    <div class="form-group">
      <label>Name</label>  
      <input type="text" class="form-control" placeholder="Name"
      name="name" value="<?php if(!isset($eid)){echo $_SESSION["retfhtgj_name"];}elseif(isset($eid)){echo $row_eid['name'];}?>" required>
    </div>

    <div class="form-group">
      <label>Contact Number</label>
      <input type="text" class="form-control" placeholder="Contact Number" 
      name="contact_number" value="<?php if(!isset($eid)){echo $_SESSION["retfhtgj_contact_number"];}elseif(isset($eid)){echo $row_eid['contact_number'];}?>" required>
    </div>
    
    <!-- <div class="professor" style="display: none;">
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
    </div> -->

    <?php if(isset($eid)) { ?>
    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control"  placeholder="Password" 
      name="password" value="<?php if(isset($eid)){echo $row_eid['password'];} ?>" required>
    </div>
  <?php } ?>

    <div class="edit">

     <?php 
      $selectQuery = "select * from user WHERE id='".$_SESSION["retfhtgj_id"]."' AND status=1";
      $runQuery = $conn->query($selectQuery);
      while($row = mysqli_fetch_array($runQuery))
      {
      ?>

      <a href="dashboard.php?eid=<?php echo $row["id"]; ?>" 
      i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

    <?php } ?>
    </div><br>
    
    <?php if(isset($eid)) { ?>
    <input type="submit" class="btn btn-primary me-2" name="submit" value="update">
    <?php } ?>
    
  </form>

  </div>
  </div>
  </div>
  
<!-- borrow details table -->
<?php if($_SESSION["retfhtgj_user_type"] == "student" || ($_SESSION["retfhtgj_user_type"] == "professor"))  { ?> 
<div class="col-lg-8 grid-margin stretch-card mrgn">
<div class="card">
<div class="card-body">
  <h4 class="card-title">Booking Summary</h4>
  <p class="card-description"> Borrow</p>
  
  <div class="table-responsive" id="bkng_tbl">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Book Name</th>
          <th>Booking Date</th>
          <th>Booking Time</th>
        </tr>
      </thead>
      <tbody>

         <?php
            $selectQuery="select * from booking 
            WHERE user_id='".$_SESSION["retfhtgj_id"]."' AND pending_status=1";
            $runQuery = $conn->query($selectQuery);
            while($row=mysqli_fetch_array($runQuery))
            {

              $select_books="SELECT * FROM books 
              WHERE id='".$row['book_id']."' AND status='1'";
              $run_books=$conn->query($select_books);
              $row_books=mysqli_fetch_array($run_books);

          ?>
        <tr>
          <td><?php echo $row_books['book_name'] ?></td>
          <td><?php echo $row['date'] ?></td>
          <td><?php echo $row['time'] ?></td>
        </tr>    
        <?php } ?>                
      </tbody>
    </table>
  </div><br>
    <p style="color:red;">Note:</p>
    <p><p>* A Book can be borrowed Only for maximum 03 days.<br> * Per day charge is 50/=<br>* A fine of 70/= per day will be included for late returns.</p>
  </div>
  </div>
  </div>
<?php } ?>

</div>

<!-- calling footer.php -->
 <?php require_once('footer.php'); ?>     
	  
