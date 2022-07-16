<!-- connecting config.php -->
<?php require_once('php/common/config.php');?>

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
	 }

	if(isset($_POST['submit'])){

	$name = $_POST['name'];
	$contact_number = $_POST['contact_number'];
	$password = md5($_POST['password']);

	if(isset($password))
		{
			$selectQuery_password="SELECT * FROM user WHERE name='".$name."' AND status='1'";
	        $runQuery_password=$conn->query($selectQuery_password);
	        $num_row_password=mysqli_num_rows($runQuery_password);

	        if($password=="")
	        {
	        	$error_password="* Password cannot be empty";
	        	$error_number=1;
	        }
		}

	if($error_number<1){
	$sql = "UPDATE user SET name='".$name."', contact_number='".$contact_number."',password='".$password."' WHERE id='".$eid."' AND status='1' ";
	
	if($conn->query($sql))
	{
  		$sucessMsg = "Sucsessfully Updated Profile info!";
	}
	
	}	
}
?>

<!-- $sql = "UPDATE user SET name='".$name."', contact_number='".$contact_number."',password='".$password."' WHERE id='".$eid."' AND status='1' "; -->