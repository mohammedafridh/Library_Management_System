<?php require_once("php/common/config.php");?>

<?php
if (isset($_POST['login']))
{
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $selectQuery="select * from user WHERE email='".$email."' AND password='".$password."' AND status=1";
  $runQuery=$conn->query($selectQuery);
  $num_row=mysqli_num_rows($runQuery);

  if($num_row > 0)
  {
    $row_user_info=mysqli_fetch_array($runQuery);
    
    $_SESSION["retfhtgj_id"] = $row_user_info['id'];
    $_SESSION["retfhtgj_name"] = $row_user_info['name'];
    $_SESSION["retfhtgj_contact_number"] = $row_user_info['contact_number'];
    $_SESSION["retfhtgj_user_type"] = $row_user_info['user_type'];
    $_SESSION["retfhtgj_email"] = $row_user_info['email'];
    $_SESSION["retfhtgj_status"] = $row_user_info['status'];
    
    

    header('Location: dashboard.php');
    exit;
  }
  else
  {
    $error = "Username Or Password Invalid!";
  }
}
?>

  