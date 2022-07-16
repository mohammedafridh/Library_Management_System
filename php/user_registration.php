<?php require_once("php/common/config.php");?>

<?php

	if(isset($_POST['submit']))
	{
		//assigning area
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$contact_number = $_POST['contact_number'];
		$user_type = $_POST['user_type'];
		//echo $professor_code = $_POST['professor_code'];
		//echo $librarian_code = $_POST['librarian_code'];
		$email = $_POST['email'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];

		//verfication area
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

		// Checking if the passwords match
		if ($password1 != $password2) { 
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
            	$error_contact_number = "* contact_number already exist!";
            	$error_number=1;
            }
		}

		//database area
		if($error_number < 1)
		{
			$sql="INSERT INTO `user`(`name`, `gender`, `contact_number`, `user_type`, `email`, `password`,`status`) 
				VALUES ('".$name."','".$gender."','".$contact_number."','".$user_type."','".$email."','".md5($password1)."','1')";


		
			if($conn->query($sql))
	      {
	        //$sucessMsg = "Inser Data Sucsessfully Stored";
	        header('Location: dashboard.php');
    		exit;
	      }
		}
	}
?>