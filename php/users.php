<?php require_once('php/common/config.php');?>

<?php
	if(isset($_POST['submit']))
	{
		//assigning area
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$contact_number = $_POST['contact_number'];
		$user_type = $_POST['user_type'];
		
		$professor_code = $_POST['professor_code'];
		$librarian_code = $_POST['librarian_code'];
		
		$email = $_POST['email'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];

		
		//verfication area
		if(isset($professor_code))
		{
			if($professor_code != "")
			{
				$select_p_code = "SELECT * FROM professor WHERE code='".$professor_code."' AND status='1'";
	            $run_p_code = $conn->query($select_p_code);
	            $num_p_code = mysqli_num_rows($run_p_code);
	            if($num_p_code > 0)
	            {
	            	$row_p_code = mysqli_fetch_array($run_p_code);
	            	$professor_code = $row_p_code['code'];
	            }
	            else
	            {
	            	$error_p_code = "* professior code Error!";
	                $error_number=1;
	            }
        	}
		}

		if(isset($librarian_code))
		{
			if($librarian_code != "")
			{
				$select_l_code = "SELECT * FROM librarian WHERE code='".$librarian_code."' AND status='1'";
	            $run_l_code = $conn->query($select_l_code);
	            $num_l_code = mysqli_num_rows($run_l_code);
	            if($num_l_code > 0)
	            {
	            	$row_l_code = mysqli_fetch_array($run_l_code);
	            	$librarian_code = $row_l_code['code'];
	            }
	            else
	            {
	            	$error_l_code = "* Librarian code Error!";
	                $error_number=1;
	            }
        	}
		}
		
		if(isset($email))
		{
			$selectQuery_email = "SELECT * FROM user WHERE email='".$email."' AND status='1' ";
            $runQuery_email = $conn->query($selectQuery_email);
            $num_row_email = mysqli_num_rows($runQuery_email);

            if($num_row_email > 0)
            {
            	$error_email = "* Email already exist!";
                $error_number=1;
            }
		}

		if ($password1 != $password2) 
		{ 
        	$errorMsg = "The two passwords do not match"; 
        	$error_number=1; 
    	} 

		if(isset($contact_number))
		{
			$selectQuery_contact_number = "SELECT * FROM user WHERE contact_number='".$contact_number."' AND status='1' ";
            $runQuery_contact_number = $conn->query($selectQuery_contact_number);
            $num_row_contact_number = mysqli_num_rows($runQuery_contact_number);

            if($num_row_contact_number > 0)
            {
            	if(!isset($eid))
            	{
            		$error_contact_number = "* contact_number already exist!";
            		$error_number=1;
            	}
            }
		}

		

		//database area
		if($error_number < 1)
		{
			$sql="INSERT INTO `user`(`name`, `gender`, `contact_number`, `user_type`, `email`, `password`,`status`) 
				VALUES ('".$name."','".$gender."','".$contact_number."','".$user_type."','".$email."','".md5($password1)."','1')";

			if($conn->query($sql))
	      {
	        $sucessMsg = "Insert Data Sucsessfully Stored";
	      }
		}
	}
?>


<?php
	//edit part
	if(isset($_GET['eid']))
	{ 
		$eid = $_GET['eid'];
		$select_eid = "SELECT * FROM user WHERE id='".$eid."' AND status='1'";
	    $run_eid = $conn->query($select_eid);
	    $num_eid = mysqli_num_rows($run_eid);
	    if($num_eid > 0)
	    {
	    	$row_eid = mysqli_fetch_array($run_eid);
	    }

	    if(isset($_POST['update']))
		{
			$name = $_POST['name'];
			$gender = $_POST['gender'];
			$contact_number = $_POST['contact_number'];

			$sql = "UPDATE user SET name='".$name."', gender='".$gender."', 
			contact_number='".$contact_number."' WHERE id='".$eid."' AND status='1' ";
			
			if($conn->query($sql))
			{
		  		$sucessMsg = "Sucsess fully updated user info!";
			}
		}
	}
?>

<?php
	//delete part
	if(isset($_GET['did']))
	{ 
		$did = $_GET['did'];
		$select_did = "SELECT * FROM user WHERE id='".$did."' AND status='1'";
	    $run_did = $conn->query($select_did);
	    $num_did = mysqli_num_rows($run_did);
	    if($num_did > 0)
	    {
	    	$row_did = mysqli_fetch_array($run_did);
	    	$sql = "UPDATE user SET status='0'  WHERE id='".$did."' ";
	    	if($conn->query($sql)){ $sucessMsg = "Sucsessfully Deleted!"; }
	    }
	}
?>