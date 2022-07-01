<?php 
	require 'header.php';
?>
<link rel="stylesheet" type="text/css" href="profile.css">
<div class="profile">
	<div class="img">
		
		<img src="img/mak.png" alt="profileimg" class="profileimg">
		<div class="upload-form">
			<form action="inc/upload.php" method="POST" enctype="multipart/form-data">
				<input type="file" name="file">
 				<button type="submit" name="submit-upload">UPLOAD</button>
 	
 			</form>
 		</div>
	</div>
	<div class="info">
		<p class="username">
			<?php echo $_SESSION['uid'];
			?>
 		</p>
		

		<p class="email">
		<?php echo $_SESSION['email'];
			?>
		</p>


		<p class="descryption">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consectetur leo sed libero volutpat vehicula. Phasellus sed aliquam tortor. Sed viverra mauris a commodo viverra. Curabitur turpis felis, finibus et lectus sit amet, fermentum cursus mi. Donec ut odio nec lorem venenatis posuere nec in ante. Praesent eget pharetra sem. Aenean dignissim lacinia massa, ut ullamcorper tellus suscipit a. Cras pellentesque eu massa eget bibendum. Sed placerat rutrum tortor sit amet vestibulum. Donec a viverra dui, et convallis lectus
		</p>

	</div>
	
</div>
<?php 
	require "footer.php";
?>