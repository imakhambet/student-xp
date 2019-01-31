<?php  
    //nahravani foto
	error_reporting(E_ERROR | E_PARSE);

	$connect = mysqli_connect("localhost", "ismukmak", "webove aplikace", "ismukmak");  
	if(isset($_POST['post']))  {  
    	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
		$text = mysqli_real_escape_string($connect, $_POST['title']);
		$query = "INSERT INTO `tbl_images`(`name`, `title`)  VALUES ('$file','$text')";
    	mysqli_query($connect, $query); 
	}
 ?>  

