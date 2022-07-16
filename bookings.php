<?php require_once('header.php'); ?>
<?php require_once('php/bookings.php');?>        

<div class="col-sm-100% stretch-card grid-margin">
<div class="card">
<div class="card-body">
<!-- Booking Details Table -->
    <table id="table_id" class="display">
    <thead>
        <tr>
            <th>User Name</th>
            <th>Book Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Actions</th>
        </tr>
    </thead>    
    <tbody>
        <?php
            $selectQuery = "SELECT * FROM booking WHERE status='1'";
            $runQuery= $conn->query($selectQuery);
            while($row = mysqli_fetch_array($runQuery))
            {
                // get user details
                $select_user = "SELECT * FROM user WHERE id = '".$row['user_id']."' AND status='1'";
                $run_user = $conn->query($select_user);
                $row_user = mysqli_fetch_array($run_user);

                //get book details
                $select_book = "SELECT * FROM books WHERE id='".$row['book_id']."' AND status='1'";
                $run_book = $conn->query($select_book);
                $row_book = mysqli_fetch_array($run_book);
        ?>
            <tr>
                <td><?php echo $row_user['name'] ?></td>
                <td><?php echo $row_book['book_name'] ?></td>
                <td><?php echo $row['date'] ?></td>
                <td><?php echo $row['time'] ?></td>
                <td>
                    <a target="_blank" href="invoice.php?iid=<?php echo $row['id']; ?>" title="Invoice" 
                    i class="fa fa-book" aria-hidden="true"></i></a>
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