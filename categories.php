<?php require_once('header.php'); ?>
<?php require_once('php/categories.php');?>

<!-- Category Insertion form -->
<?php if($_SESSION["retfhtgj_user_type"] == "Admin" || ($_SESSION["retfhtgj_user_type"] == "librarian"))  { ?>
<div class="row">
<div class="col-3 grid-margin stretch-card">
<div class="card">
<div class="card-body">    
    <h4 class="card-title"><?php if(isset($eid)){echo "Upadate Category";}else{echo "Add new Category";} ?></h4>
    <p class="card-description">Category Insertion</p>
    <?php if(isset($succesMsg)){echo $sucessMsg; } ?>
    <form class="forms-sample" method="post">
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" class="form-control" placeholder="Enter Category" name="category_name" value="<?php if(isset($name)){echo $name;} elseif(isset($eid)){echo $row_eid['category_name'];} ?>">
            <?php if(isset($error_name)){echo $error_name; }?>
        </div> 
        <input type="submit" class="btn btn-primary me-2" value="<?php if(isset($eid)){echo "update";} else{echo "submit";} ?>" 
        name="<?php if(isset($eid)){echo "update";} else{echo "submit";} ?>">
    </form>
</div>
</div>
</div>
<?php } ?>

<div class="col-sm-8 stretch-card grid-margin">
<div class="card">
<div class="card-body">
    <table id="table_id" class="display">
    <thead>
        <!-- category table -->
        <tr> 
            <th>Name</th>
        <?php if($_SESSION["retfhtgj_user_type"] == "Admin" || 
        ($_SESSION["retfhtgj_user_type"] == "librarian"))  { ?> 
            <th>Actions</th>
         <?php } ?>  

        </tr>
    </thead>
    
    <!-- view category details  -->  
    <tbody>
        <?php 
        $selectQuery = "select * from book_category WHERE status=1";
        $runQuery = $conn->query($selectQuery);
        while($row = mysqli_fetch_array($runQuery))
        {
        ?>
            <tr>
                <td><?php echo $row['category_name'] ?></td>
                <?php if($_SESSION["retfhtgj_user_type"] == "Admin" || ($_SESSION["retfhtgj_user_type"] == "librarian"))  { ?> 
                <td>
                    <a href="categories.php?eid=<?php echo $row['id']; ?>" 
                    i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                    <a href="categories.php?did=<?php echo $row['id']; ?>" 
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


