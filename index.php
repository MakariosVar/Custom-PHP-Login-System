<?php 
	require 'header.php';
?>



		<main>
			<?php 
				if (isset($_SESSION['idUsers'])) {
				echo '<p class="status">YOU ARE LOGGED IN!</p>';				
				}
				else{
					echo '<p class="status">YOU ARE LOGGED OUT!</p>';
				}
			?>
			
		</main>

<?php 
	require "footer.php";
?>