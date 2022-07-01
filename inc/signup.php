<?php 

	if (isset($_POST['signup-submit'])) {


		require 'dbh.php';

		$username = $_POST['uid'];
		$email = $_POST['mail'];
		$password = $_POST['pwd'];
		$passwordrepeat = $_POST['pwd-repeat'];


		if (empty($username) || empty($email) || empty($password) || empty($passwordrepeat)) {
			header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
			exit();
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zAZ0-9]*$/",$username )){
			header("Location: ../signup.php?error=invalidmailuid");
			exit();

		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: ../signup.php?error=invalidmail&uid=".$username);
			exit();
		}
		elseif(!preg_match("/^[a-zAZ0-9]*$/",$username)){
			header("Location: ../signup.php?error=invaliduid&mail=".$email);
			exit();
		}
		elseif ($password !== $passwordrepeat){
			header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
			exit();
		}
		else{

			$sql = "SELECT * FROM users WHERE uid=? ";
			$stmt = mysqli_stmt_init($conn);

			if (!mysqli_stmt_prepare($stmt,$sql)) {
				header("Location: ../signup.php?error=sqlerror");
				exit();
			
			}
			
			else{ 
					// SQL Statement
					$sql1 = "SELECT * FROM users WHERE email='".$email."'";

					// Process the query
					$results = $conn->query($sql1);

					// Fetch Associative array
					$row = $results->fetch_assoc();              
					
				if(is_array($row) && count($row)>0) {
      				 
              	

					header("Location: ../signup.php?error=mailexist");
					exit();


				}else{
				
					$sql = "SELECT * FROM users WHERE uid=? ";
					mysqli_stmt_bind_param($stmt,"s", $username);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					$resultcheck = mysqli_stmt_num_rows($stmt);
					if ($resultcheck > 0){
						header("Location: ../signup.php?error=usertaken&mail=".$email);
						exit();

					}

					else
					{
						$sql = "INSERT INTO users(uid, email, pwd) VALUES(?, ?, ?) ";
						$stmt = mysqli_stmt_init($conn);
						if (!mysqli_stmt_prepare($stmt,$sql)) {

							header("Location: ../signup.php?error=sqlerror");
							exit();

						}
						else{

							$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

							mysqli_stmt_bind_param($stmt,"sss", $username, $email, $hashedPwd);
							mysqli_stmt_execute($stmt);
							header("Location: ../signup.php?signup=success");
							exit();
						}
					}
				}	
			}
		
		}
	}
	else
	{
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

	header("Location: ../signup.php");
	exit();
	}
