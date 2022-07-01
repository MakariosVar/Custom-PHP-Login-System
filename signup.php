<?php 
	require 'header.php';
?>



	
			<h1>SIGNUP</h1>
			<?php
					if (isset($_GET['error'])) {
					 	if ($_GET['error'] == "emptyfields") {
					 		echo "-----------FILL ALL THE FIELDS-------------";
					 	}
					 	elseif ($_GET['error'] == "invaliduid") {
					 		echo "-----------INVALID USERNAME-------------";
					 	}
					 	elseif ($_GET['error'] == "invalidmail") {
					 		echo "-----------INVALID EMAIL-------------";
					 	}
					 	elseif ($_GET['error'] == "passwordcheck") {
					 		echo "-----------WRONG PASSWORD REPEAT-------------";
					 	}
					 	elseif ($_GET['error'] == "usertaken") {
					 		echo "-----------USERNAME ALLREADY EXIST-------------";
					 	}
					 	elseif ($_GET['error'] == "mailexist") {
					 		echo "-----------EMAIL ALLREADY EXIST-------------";
					 	}

					}
					elseif (isset($_GET['signup'])){
						if ($_GET['signup'] == "success") {
					 		echo "-----------WELCOME-------------";
						}
					}	
					
			?>
			<form action="inc/signup.php" method="post">
					<input type="text" name="uid" placeholder="Username">
					<input type="text" name="mail" placeholder="Email">
					<input type="password" name="pwd" placeholder="Password">
					<input type="password" name="pwd-repeat" placeholder="Repeat Password">
					<button type="submit" name="signup-submit">Signup</button>
			</form>

	
<?php 
	require "footer.php";
?>