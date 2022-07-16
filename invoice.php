
<?php require_once("php/common/config.php");?>
<?php require_once("php/common/verification.php");?>

<!--Invoice print-->
<h1>Invoice</h1>
<?php
	//booking part
	if(isset($_GET['iid']))
	{
		$iid = $_GET['iid'];

		//booking details
		$select_res = "SELECT * FROM booking WHERE id='".$iid."' AND status='1'";
        $run_res = $conn->query($select_res);
        $row_res = mysqli_fetch_array($run_res);

        //user details
        $select_user = "SELECT * FROM user WHERE id = '".$row_res['user_id']."' AND status='1'";
        $run_user = $conn->query($select_user);
        $row_user = mysqli_fetch_array($run_user);

        //book details
        $select_book = "SELECT * FROM books WHERE id='".$row_res['book_id']."' AND status='1'";
        $run_book = $conn->query($select_book);
        $row_book = mysqli_fetch_array($run_book);

        echo "Holder Name : ".$row_user['name']."<br>";
        echo "Book Name : ".$row_book['book_name']."<br>";
        echo "Borrow Date : ".$row_res['date']."<br>";
        echo "Borrow Time : ".$row_res['time']."<br>";


       //fine calculation
	   $assigned_time = $row_res['date'].' '.$row_res['time'];
	   $completed_time= $this_t_date.' '.$this_d_time; 
	   $d1 = new DateTime($assigned_time);
	   $d2 = new DateTime($completed_time);
	   $interval = $d2->diff($d1);
	   $interval_1 = $interval->format('%d');
	   echo "No of Days : ".$interval->format('%d')."<br>";

	   if($interval_1 <= '3')
	   {
	   		if($interval_1 == '0') { $amount = '50'; }
	   		else { $amount = $interval_1*50; }	
	   }
	 
	   else
	   {
	   		$amount = 50*3;
	   		$fine = $interval_1-3;
	   		$newfine = $fine*70;
	   }

	   echo "<br>"."<br>";
	   echo "Amount Rs :".$amount."<br>";
	   if(isset($newfine)){ echo "Fine Amount :".$newfine; }
	}
?>

<br><br>
<a href="bookings.php?cid=<?php echo $iid; ?>">Print Invoice</a>