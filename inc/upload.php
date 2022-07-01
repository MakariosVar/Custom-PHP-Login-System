<?php 
if (isset($_POST['submit-upload'])) {
	$file = $_FILES['file'];
	
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];


	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg','jpeg','png', 'pdf');

	if (in_array($fileActualExt,$allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 2097152) {
				$filenamenew = uniqid('', true).".".$fileActualExt;
				$fileDestination = '../uplds/'.$filenamenew;
				move_uploaded_file($fileTmpName , $fileDestination);
				header("Location: ../profile.php?uploadsuccess");
			}
			else{
				echo "Your file is to big!";
				}
		}
		else{
			echo "There was an error uploading your file";
		}
	}else{
		echo "You can upload .jpg, .jpeg, .png and .pdf";
	}
}