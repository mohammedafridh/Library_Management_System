<?php require_once('header.php'); ?>
<?php require_once('php/books.php'); ?>

<!-- librarian add book -->
<?php if($_SESSION["retfhtgj_user_type"] == "Admin" || 
($_SESSION["retfhtgj_user_type"] == "librarian"))  { ?>
<div class="row">
    <div class="col-4 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">

    <h4 class="card-title"><?php if(isset($eid)){echo "Update Book Details";}else{echo "Add Book";} ?></h4>
    <p class="card-description">Enter Book Details</p>
    <?php if(isset($sucessMsg)) {echo $sucessMsg;} ?>
    <form class="forms-sample" method="post">

      <div class="form-group">
      <label>Categorys</label>
      <select class="form-control" name="category_id" required>
        <option hidden>Select Category</option>
        <?php
            $select_all_cat="SELECT * FROM book_category WHERE status='1'";
            $run_all_cat=$conn->query($select_all_cat);
            while($row_all_cat=mysqli_fetch_array($run_all_cat))
            {
        ?>
            <option value="<?php echo $row_all_cat['id']; ?>"> 
            <?php echo $row_all_cat['category_name']; ?></option>
        <?php } ?>
      </select>
     </div>
        
      <div class="form-group">
        <label>Book Name</label>
        <input type="text" class="form-control" placeholder="Enter Book Name" 
        name="name"
        value="<?php if(isset($name)){echo $name;} elseif(isset($eid)){echo $row_eid['book_name'];} ?>">
        <?php if(isset($error_Msg)) {echo $error_Msg;} ?>
      </div>

      <div class="form-group">
        <label>Author</label>
        <input type="text" class="form-control" placeholder="Enter Author Name" 
        name="author"
        value="<?php if(isset($author)){echo $author;} elseif(isset($eid)){echo $row_eid['author'];} ?>">
      </div>
      <input type="submit" class="btn btn-primary me-2" value="<?php if(isset($eid)){echo "update";} else{echo "submit";} ?>" 
        name="<?php if(isset($eid)){echo "update";} else{echo "submit";} ?>">              
    </form>
    </div>
    </div>
    </div>
<?php } ?>

<!-- books table -->
<div class="col-sm-12 stretch-card grid-margin">
<div class="card">
    <p class = "scs"><?php if(isset($successMsg)) { echo $successMsg; } ?></p>
    <p class = "scs"><?php if(isset($deleteMsg)) { echo $deleteMsg; } ?></p>
<div class="card-body">
<!-- book data table  -->
<table id="table_id" class="display">
    <thead>
        <tr>  
            <th>Category Type</th>
            <th>Book Name</th>
            <th>Author</th>
            <th>Status</th>
            <th>Booking</th>
        <?php if($_SESSION["retfhtgj_user_type"] == "Admin" || 
        ($_SESSION["retfhtgj_user_type"] == "librarian"))  { ?> 
            <th>Actions</th>
         <?php } ?> 
        </tr>
    </thead>
    <!-- books table data adding part -->
    <tbody>
        <?php
            $selectQuery="select * from books WHERE status=1";
            $runQuery = $conn->query($selectQuery);
            while($row=mysqli_fetch_array($runQuery))
            {
                //category name
                $select_cat="SELECT * FROM book_category 
                WHERE id='".$row['category_id']."' AND status='1'";
                $run_cat=$conn->query($select_cat);
                $row_cat=mysqli_fetch_array($run_cat);

                //reservation status
                $select_1="SELECT * FROM reservations WHERE book_id='".$row['id']."' AND status='1'";
                $run_1=$conn->query($select_1);
                $num_1=mysqli_num_rows($run_1);

                //booking status
                $select_2="SELECT * FROM booking WHERE book_id='".$row['id']."' AND status='1'";
                $run_2=$conn->query($select_2);
                $num_2=mysqli_num_rows($run_2);
                
                if($num_1 > 0)
                {
                    $res = "Reserved";
                }
                elseif($num_2 > 0)
                {
                    $res = "Barowed";
                }
                else
                {
                    $res = "Available";
                }

        ?>
            <tr>
                <td><?php echo $row_cat['category_name']; ?></td>
                <td><?php echo $row['book_name']; ?></td>
                <td><?php echo $row['author']; ?></td>
                <td><?php echo $res; ?></td>
                <td>
                    <a type="submit" href="books.php?rid=<?php echo $row['id']; ?>" 
                    class="badge badge-success" 
                    id="<?php if($res=="Reserved"){echo"y_disabled";} elseif($res=="Barowed"){echo"y_disabled";} else{echo "n_disabled";} ?>">Reserve</a>
                </td>
            <?php if($_SESSION["retfhtgj_user_type"] == "Admin" || 
            ($_SESSION["retfhtgj_user_type"] == "librarian"))  { ?>
                <td>
                    <a href="books.php?eid=<?php echo $row['id']; ?>"
                     i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                     <a href = "books.php?did=<?php echo $row['id']; ?> " 
                     i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
    </table>
</div>
</div>
</div>
</div>

 <?php require_once('footer.php'); ?> 