<?php
$selectQuery = "SELECT * FROM user WHERE email='".$email."' AND status='1' ";
$runQuery = $conn->query($selectQuery);
$num_row = mysqli_num_rows($runQuery);
?>

while($row=mysqli_fetch_array($runQuery))