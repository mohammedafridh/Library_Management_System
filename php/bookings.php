<?php require_once('php/common/config.php');?>

<?php
	if(isset($_POST['submit']))
	{
		//assigning area
		$user_name = $_POST['user_name'];
		$book = $_POST['book_name'];
		$email = $_POST['email'];
		$contact_number = $_POST['contact_number'];
		$booking_type = $_POST['booking_type'];
		$booking_date = $_POST['booking_date'];
		$return_date = $_POST['return_date'];
		

		//verfication area
		if(isset($book))
		{
			$selectQuery_book = "SELECT * FROM books WHERE book_name='".$book."' AND status='1' ";
            $runQuery_book = $conn->query($selectQuery_book);
            $num_row_book = mysqli_num_rows($runQuery_book);

            if($num_row_book < 1)
            {
            	$errorMsg  = "* Sry! The book you entered is invalid or might not available in our library";
            	$error_number=1;
            }
		}

		if(isset($book))
		{
			$selectQuery_book = "SELECT * FROM booking WHERE book_name='".$book."' AND pending_status='1' ";
            $runQuery_book = $conn->query($selectQuery_book);
            $num_row_book = mysqli_num_rows($runQuery_book);

            if($num_row_book > 0)
            {
            	$errorMsg1  = "* Book is not available at the moment!";
            	$error_number=1;
            }
		}

		if(isset($email))
		{
			$selectQuery_email = "SELECT * FROM user WHERE email='".$email."' AND status='1' ";
            $runQuery_email = $conn->query($selectQuery_email);
            $num_row_email = mysqli_num_rows($runQuery_email);

            if($num_row_email < 1)
            {
            	$errorMsg2  = "* Check the E-mail Address!";
            	$error_number=1;
            }
		}

		if(isset($contact_number))
		{
			$selectQuery_contact_number = "SELECT * FROM user WHERE email = '".$email."' AND contact_number='".$contact_number."'  ";
            $runQuery_contact_number = $conn->query($selectQuery_contact_number);
            $num_row_contact_number = mysqli_num_rows($runQuery_contact_number);

            if($num_row_contact_number < 1)
            {
            	$errorMsg3  = "* Check the E-mail address & Contact Number!";
            	$error_number=1;
            }
		}

		//database area
		if($error_number < 1)
		{
			$sql="INSERT INTO `booking`(`user_name`,`book_name`,`email`,`contact_number`,`booking_type`,`booking_date`,`return_date`,`pending_status`,`status`) VALUES ('".$user_name."','".$book."','".$email."','".$contact_number."','".$booking_type."','".$booking_date."','".$return_date."','1','1')";

			//run query
			if($conn->query($sql))
		    {
		      $successMsg = "Inser Data Sucsessfully Stored";
		    }

		}
	}
?>

<?php
	if(isset($_GET['eid'])){
		$eid = $_GET['eid'];
		$select_eid = "SELECT * FROM booking WHERE id='".$eid."' AND status = '1'";
		$run_eid = $conn->query($select_eid);
		$num_eid = mysqli_num_rows($run_eid);

		if($num_eid > 0)
		{
			$row_eid = mysqli_fetch_array($run_eid);
		}

		if(isset($_POST['update']))
		{
			$sql = "UPDATE booking SET user_name='".$user_name."', book_name='".$book."', email='".$email."', contact_number='".$contact_number."', booking_type='".$booking_type."', booking_date='".$booking_date."', return_date='".$return_date."', ";

			if($conn->query($sql))
			{
				$sucessMsg = "Sucsessfully updated Booking info!";
			}
		}
	}
?>

<?php
	//delete part
	if(isset($_GET['did']))
	{ 
		$did = $_GET['did'];
		$select_did = "SELECT * FROM booking WHERE id='".$did."' AND status='1'";
	    $run_did = $conn->query($select_did);
	    $num_did = mysqli_num_rows($run_did);
	    if($num_did > 0)
	    {
	    	$row_did = mysqli_fetch_array($run_did);
	    	$sql = "UPDATE bookinng SET status='0'  WHERE id='".$did."' ";
	    	if($conn->query($sql)){ $sucessMsg = "Sucsessfully Deleted!"; }
	    }
	}
?>

<?php
	//booking-invoice conformation part
	if(isset($_GET['cid']))
	{ 
		$cid = $_GET['cid'];
		$sql="UPDATE booking SET pending_status='0', status='0' WHERE id='".$cid."'";
        if($conn->query($sql)){ $sucessMsg = "Confirmed Invoice-Data Updated!"; }
	}
?>