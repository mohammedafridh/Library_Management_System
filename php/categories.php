<?php require_once('php/common/config.php');?>


<?php
	//new data adding
	if(isset($_POST['submit']))
	{
		//new data add area
		$name=$_POST['category_name'];

		//validation part
		if(isset($name))
		{
			$selectQuery_name="SELECT * FROM book_category WHERE category_name='".$name."' AND status='1'";
	        $runQuery_name=$conn->query($selectQuery_name);
	        $num_row_name=mysqli_num_rows($runQuery_name);

	        if($num_row_name>0)
	        {
	        	$error_name="* Category name already exist!";
	        	$error_number=1;
	        }
	        elseif($name=="")
	        {
	        	$error_name="* Category name not be null!";
	        	$error_number=1;
	        }
		}

		//up to db
		if($error_number<1)
		{
			$sql="INSERT INTO `book_category`(`category_name`,`status`) VALUES ('".$name."','1')";
			if($conn->query($sql)){ $successMsg = "Inser Data Sucsessfully Stored"; }
		}
	}
?>

<?php
	//edit part
	if(isset($_GET['eid']))
	{ 
		$eid = $_GET['eid'];
		$select_eid = "SELECT * FROM book_category WHERE id='".$eid."' AND status='1'";
	 	$run_eid = $conn->query($select_eid);
	 	$num_eid = mysqli_num_rows($run_eid);

	 	if($num_eid > 0)
	 	{
	 		$row_eid = mysqli_fetch_array($run_eid);
	 	}
	 }

	 if(isset($_POST['update']))
	 {
	 	$name=$_POST['category_name'];
	 	
	 	$sql="UPDATE book_category SET category_name='".$name."' WHERE id='".$eid."' AND status='1'";
 		if($conn->query($sql)) { $sucessMsg = "Sucsessfully updated!"; }
	 }
?>

<?php
	//delete part
	if(isset($_GET['did']))
	{ 
		$did = $_GET['did'];
		$select_did = "SELECT * FROM book_category WHERE id='".$did."' AND status='1'";
	    $run_did = $conn->query($select_did);
	    $num_did = mysqli_num_rows($run_did);
	    if($num_did > 0)
	    {
	    	$row_did = mysqli_fetch_array($run_did);
	    	$sql = "UPDATE book_category SET status='0'  WHERE id='".$did."' ";
	    	if($conn->query($sql)){ $sucessMsg = "Sucsessfully Deleted Category info!"; }
	    }
	}
?>


