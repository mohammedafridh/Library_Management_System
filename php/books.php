<?php require_once('php/common/config.php');?>

<?php
	if(isset($_POST['submit']))
	{
		//assigning area
		$category_id = $_POST['category_id'];
		$name = $_POST['name'];
		$author = $_POST['author'];
		

		//verfication area
		if(isset($name))
		{
			$selectQuery_name = "SELECT * FROM books WHERE book_name='".$name."' AND status='1' ";
            $runQuery_name = $conn->query($selectQuery_name);
            $num_row_name = mysqli_num_rows($runQuery_name);

            if($num_row_name > 0)
            {
            	$error_name  = "* Book already exist!";
            	$error_number=1;
            }
		}

		//database area
		if($error_number < 1)
		{
			$sql="INSERT INTO `books`(`category_id`,`book_name`,`author`,`status`) VALUES ('".$category_id."','".$name."','".$author."','1')";
		}

		//run query
		if($conn->query($sql))
	    {
	      $successMsg = "Inser Data Sucsessfully Stored";
	    }

	}
?>

<?php
	//edit book part
	if(isset($_GET['eid']))
	{ 
		$eid = $_GET['eid'];
		$select_eid = "SELECT * FROM books WHERE id='".$eid."' AND status='1'";
	    $run_eid = $conn->query($select_eid);
	    $num_eid = mysqli_num_rows($run_eid);
	    if($num_eid > 0)
	    {
	    	$row_eid = mysqli_fetch_array($run_eid);
	    }

	    if(isset($_POST['update']))
		{
			$category_id = $_POST['category_id'];
			$name = $_POST['name'];
			$author = $_POST['author'];

			$sql = "UPDATE books SET category_id='".$category_id."', book_name='".$name."', 
			author='".$author."' WHERE id='".$eid."' AND status='1' ";
			
			if($conn->query($sql))
			{
		  		$sucessMsg = "Sucsessfully updated book info!";
			}
		}
	}
?>

<?php
	//delete book part
	if(isset($_GET['did']))
	{ 
		$did = $_GET['did'];
		$select_did = "SELECT * FROM books WHERE id='".$did."' AND status='1'";
	    $run_did = $conn->query($select_did);
	    $num_did = mysqli_num_rows($run_did);
	    if($num_did > 0)
	    {
	    	$row_did = mysqli_fetch_array($run_did);
	    	$sql = "UPDATE books SET status='0'  WHERE id='".$did."' ";
	    	if($conn->query($sql)){ $deleteMsg = "Sucsessfully Deleted!"; }
	    }
	}
?>

<?php
	//reservation book part
	if(isset($_GET['rid']))
	{
		$u_id = $_SESSION["retfhtgj_id"];
		$b_id = $_GET['rid'];

		$sql="INSERT INTO `reservations`
		(`user_id`,`book_id`,`date`,`time`,`pending_status`,`status`) 
		VALUES ('".$u_id."','".$b_id."','".$this_t_date."','".$this_d_time."','1','1')";

		if($conn->query($sql)){ $successMsg = "* Reservation Confirmed!"; }
	}
?>