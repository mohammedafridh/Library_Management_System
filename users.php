<?php require_once('php/users.php');?>
<?php require_once('header.php'); ?>

<div class="row"> 
 <div class="col-4 grid-margin stretch-card">
 <div class="card">
 <div class="card-body">
<!-- Librarian register user form-->  
<center>
    <h4 class="card-title"><?php if(isset($eid)){echo "Upadate User";}else{echo "Register User";} ?></h4>
    <p class="card-description">Enter below details</p>
    <p class="error_msg"><?php if(isset($sucessMsg)) { echo $sucessMsg; } ?></p>
  </center>
  
  <form class="forms-sample" method="post">
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" placeholder="Name"
      name="name" 
      value="<?php if(isset($name)){echo $name;} elseif(isset($eid)){echo $row_eid['name'];} ?>" required>
    </div>

     <div class="form-group">
      <label>Gender</label>
      <select class="form-control" name="gender" required>
        <option hidden>Select Gender</option>
        <option <?php if(isset($eid)){if($row_eid['gender']=="Male"){echo "Selected";}} ?>>
          Male
        </option>
        <option <?php if(isset($eid)){if($row_eid['gender']=="Female"){echo "Selected";}} ?>>
          Female
        </option>
      </select>
     </div>

    <div class="form-group">
      <label>Contact Number</label>
      <input type="text" class="form-control" placeholder="Contact Number" 
      name="contact_number"
      value="<?php if(isset($contact_number)){echo $contact_number;} elseif(isset($eid)){echo $row_eid['contact_number'];} ?>" required>
      <p class="error_msg"><?php if(isset($error_contact_number)){echo $error_contact_number;} ?></p>
    </div>
    
    <?php if(!isset($eid)) { ?>
    <div class="form-group">
      <label>User Type</label>
      <select class="form-control" onchange="getval(this);" 
      name="user_type" required>
        <option hidden>Select User Type</option>
        <option value="student">Student</option>
        <option value="professor">Professor</option>
        <option value="librarian">Librarian</option>
      </select>
      <p class="error_msg">
        <?php if(isset($error_p_code)) { echo $error_p_code; } ?>
        <?php if(isset($error_l_code)) { echo $error_l_code; } ?>
      </p>
    </div>
    <?php } ?>

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
        name="professor_code">
      </div>
    </div>

    <div class="librarian" style="display: none;">
      <div class="form-group">
        <label>Librarian Code</label>
        <input type="text" class="form-control"placeholder="Librarian Code" 
        name="librarian_code">
      </div>
    </div>

    <?php if(!isset($eid)) { ?>
    <div class="form-group">
      <label>E-mail</label>
      <input type="text" class="form-control"  placeholder="Email" 
      name="email" required>
      <?php if(isset($error_email)) { echo $error_email; } ?>
    </div>
    <?php } ?>
   
    <?php if(!isset($eid)) { ?>
    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control"  placeholder="Password" 
      name="password1" required>
    </div>

    <div class="form-group">
      <label>Re-enter Password</label>
      <input type="password" class="form-control" placeholder="Re-enter Password" 
      name="password2" required>
      <?php if(isset($errorMsg)) { echo $errorMsg; } ?>
    </div>
    <?php } ?>

    <div>
    <input type="submit" class="btn btn-primary me-2" value="<?php if(isset($eid)){echo "update";} else{echo "submit";} ?>" 
        name="<?php if(isset($eid)){echo "update";} else{echo "submit";} ?>">
    </div><br>

   
  </form>
  </div>
  </div>
  </div>
  
<div class="col-sm-8 stretch-card grid-margin">
<div class="card">
<div class="card-body">
  <table id="table_id" class="display">
    <!-- Users table -->
    <thead>
      <tr>
        <th>Name</th>
        <th>Gender</th>
        <th>Contact Number</th>
        <th>User Type</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>

  <tbody>
    <?php
      $selectQuery = "SELECT * FROM user WHERE status=1";
      $runQuery = $conn->query($selectQuery);
      while($row=mysqli_fetch_array($runQuery))
      {
    ?>
      <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['contact_number']; ?></td>
        <td><?php echo $row['user_type']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td>
          <a href="users.php?eid=<?php echo $row['id']; ?>" 
          i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
          <a href="users.php?did=<?php echo $row['id']; ?>" 
          i class="fa fa-trash" aria-hidden="true"></i></a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>

<?php require_once('footer.php'); ?>     