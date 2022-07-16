<?php require_once('header.php'); ?>
<?php require_once('php/reservations.php');?>

<!-- book reserve details -->
<?php if($_SESSION["retfhtgj_user_type"] == "Admin" || ($_SESSION["retfhtgj_user_type"] == "librarian")) { ?> 
<div class="col-sm-08 stretch-card grid-margin">
<div class="card">
    <?php if(isset($sucessMsg)) {echo $sucessMsg;} ?>
<div class="card-body">
    <table id="table_id" class="display">
    <thead>
        <tr>
            <th>User Name</th>
            <th>Book Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $selectQuery = "SELECT * FROM reservations WHERE status = 1";
        $runQuery= $conn->query($selectQuery);
        while($row = mysqli_fetch_array($runQuery))
        {
            //date and time calculation
            $assigned_time = $row['date'].' '.$row['time'];
            $completed_time= $this_t_date.' '.$this_d_time; 
            $d1 = new DateTime($assigned_time);
            $d2 = new DateTime($completed_time);
            $interval = $d2->diff($d1);
            $interval_1 = $interval->format('%d days');

            if($interval_1 != "0 days")
            {
                $sql="UPDATE reservations SET pending_status='0', status='0' WHERE id='".$row['id']."'";
                $conn->query($sql);
            }
            else
            {
                //get user details
                $select_user = "SELECT * FROM user WHERE id = '".$row['user_id']."' AND status='1'";
                $run_user = $conn->query($select_user);
                $row_user = mysqli_fetch_array($run_user);

                //get book details
                $select_book = "SELECT * FROM books WHERE id='".$row['book_id']."' AND status='1'";
                $run_book = $conn->query($select_book);
                $row_book = mysqli_fetch_array($run_book);

                ?>
                <tr>
                    <td><?php echo $row_user['name']; ?></td>
                    <td><?php echo $row_book['book_name']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['time']; ?></td>
                    <td>
                        <a href="reservations.php?bid=<?php echo $row['id']; ?>" title="booking" 
                        i class="fa fa-book" aria-hidden="true"></i></a>
                    </td>
                </tr>
        <?php } } ?>
    </tbody>
    </table>

    </div>
    </div>
    </div>
    </div>
<?php } ?>
</div>
<!-- Reservation Table -->
<?php if($_SESSION["retfhtgj_user_type"] == "student" || ($_SESSION["retfhtgj_user_type"] == "professor")) { ?> 
<div class="col-lg-12 grid-margin stretch-card mrgn">
<div class="card">
<div class="card-body">
  <h4 class="card-title">Reservation Summary</h4>
  <p class="card-description">Reserve</p>
  
  <div class="table-responsive" id="bkng_tbl">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Book Name</th>
          <th>Date</th>
          <th>Time</th>
        </tr>
      </thead>
      <tbody>

         <?php
            $selectQuery="select * from reservations 
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
    <p><p>* Reservations will be cancelled after 24 hours.</p>
  </div>
  </div>
  </div>
<?php } ?>      
<?php require_once('footer.php'); ?>   