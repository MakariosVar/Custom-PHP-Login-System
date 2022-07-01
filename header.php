<?php
	session_start();
	

?>	

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Custom PHP LOGIN SYSTEM</title>
	<link rel="stylesheet" type="text/css" href="header.css">
</head>
<body>


	<header class="site-header">
		<div class="wrapper site-header__wrapper">
		
			<a href="index.php">
				<img src="img/mak.png" class="logo" alt="logo" >
			</a>
			<nav >	
				<ul class="nav">
					<li><a href="index.php"><p class="navtext">Αρχική</p></a></li>
					<li><a href="#"><p class="navtext">link 1</p></a></li>
					<li><a href="#"><p class="navtext">link 2</p></a></li>
					<li><a href="#"><p class="navtext">link 3</p></a></li>
				</ul>
			</nav>
			<div  class="loginout">
				
			<?php 
				if (isset($_SESSION['idUsers'])) {
				echo '<form action="inc/logout.php" method="post">
					<ul class=WrapperOUT>
						<li>
							<p class="LogoutName">'.$_SESSION['uid'].'</p>
						</li>
						<li>
							<a href="profile.php"><p class="logoutHeader">Προφίλ</p></a></li>
						</li>
						<li>
							<button type="submit" name="logout-submit">Logout</button>
						</li>
					</ul>
					</form>';				
				}
				else{
					echo '<form action="inc/login.php" method="post">
							<ul class="wrapperLOG">
								<li>
									<input type="text" name="mailuid" placeholder="Username/Email...">
								</li>
								<li>
									<input type="password" name="pwd" placeholder="Password...">
								</li>
								<li>	
									<button type="submit" name="login-submit">Login</button>	
								</li>

						  </form>
								<li>
										<a href="signup.php"><span class="signupbutton">Signup</span></a>
								</li>	
							</ul>';
				}
			?>
			
			
			</div>	
				
				
			</div>
	

	</header>