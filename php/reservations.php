<?php require_once('php/reservations.php');?>

<?php
	//booking part
	if(isset($_GET['bid']))
	{
		$bid = $_GET['bid'];

		$select_res = "SELECT * FROM reservations WHERE id='".$bid."' AND status='1'";
        $run_res = $conn->query($select_res);
        $row_res = mysqli_fetch_array($run_res);

        $u_id = $row_res['user_id'];
        $b_id = $row_res['book_id'];

		$sql="INSERT INTO `booking`
		(`user_id`,`book_id`,`date`,`time`,`pending_status`,`status`) 
		VALUES ('".$u_id."','".$b_id."','".$this_t_date."','".$this_d_time."','1','1')";

		if($conn->query($sql))
		{
			$sql="UPDATE reservations SET pending_status='0', status='0' WHERE id='".$bid."'";
            $conn->query($sql);
			$sucessMsg = "* Booking Confirmed!"; 
		}
	}
?>
