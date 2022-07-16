<?php
	session_start();
	
	unset($_SESSION["retfhtgj_id"]);
	unset($_SESSION["retfhtgj_name"]);
	unset($_SESSION["retfhtgj_contact_number"]);
	unset($_SESSION["retfhtgj_user_type"]);
	unset($_SESSION["retfhtgj_email"]);
	unset($_SESSION["retfhtgj_status"]);

	session_unset();
	session_destroy();

	header('Location: index.php');
?>