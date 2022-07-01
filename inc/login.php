<?php

if(isset($_POST['login-submit']))
{
	require 'dbh.php';
	$mailuid = $_POST['mailuid'];
	$password = $_POST['pwd'];

	if (empty($mailuid) || empty($password)) {
		header("Location: ../index.php?error=emptyfields");
		exit();
	}
	else{
		$sql = "SELECT * FROM users WHERE uid = ? OR email=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: ../index.php?sqlerror");
				exit();
		}
		else{


			mysqli_stmt_bind_param($stmt,"ss",$mailuid, $mailuid);
			mysqli_stmt_execute($stmt);
			$results = mysqli_stmt_get_result($stmt);

			if (($row = mysqli_fetch_assoc($results)) !== null) {
				$pwdcheck = password_verify($password, $row['pwd']);
				if ($pwdcheck == false) {
					header("Location: ../index.php?error=whrongpassword");		
					exit();		
				}
				elseif ($pwdcheck == true) {
					session_start();
					$_SESSION['idUsers'] = $row['idUsers'];
					$_SESSION['uid'] = $row['uid'];
					$_SESSION['email'] = $row['email'];
					
					header("Location: ../index.php?login=success");		
					exit();	
					
 				}
				else{
					header("Location: ../index.php?error=whrongpassword");		
					exit();	
				}
			}
			else
			{
				header("Location: ../index.php?error=nouser");
				exit();
			}
		}
	}


}
else{
	header("Location: ../index.php?error=mak");

	exit();
}