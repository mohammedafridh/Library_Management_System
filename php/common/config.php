<?php
   //time & time frame
   $time_zone = date_default_timezone_set("Asia/Colombo");
   $this_t_date = date('Y-m-d'); // today date
   $this_d_time = date('H:i:s'); // digital time - 24/h
   $this_a_time = date('h:i A'); // analog time - 12/h

   session_start();
   ob_start(); //“Warning: Cannot modify header information - headers already sent by” [error fix code]
   
   //error on/off
   error_reporting(E_ALL | E_NOTICE);
   ini_set('display_errors', 1);

   //database connection
   $servername = "localhost";
   $username = "root";
   $password = "";
   $db = "libms";

   // Create connection
   $conn = mysqli_connect($servername, $username, $password,$db);

   // Check connection
   if (!$conn) 
   {
      die("Connection failed: " . mysqli_connect_error());
   }
   //echo "Connected successfully";
?>

<?php
   $error;
   $error_number=0;
?>

<?php
   //date and time calculation
   // $assigned_time = $row['date'].' '.$row['time'];
   // $completed_time= $this_t_date.' '.$this_d_time; 
   // $d1 = new DateTime($assigned_time);
   // $d2 = new DateTime($completed_time);
   // $interval = $d2->diff($d1);
   // $interval_1 = $interval->format('%d days');
?>