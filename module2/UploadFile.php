<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Upload File</title>
</head>
<body>
	
</body>



<?php
session_start();


// Get the filename and make sure it is valid
$filename = (string)basename($_FILES['uploadedfile']['name']);
$username = (string)$_SESSION['username'];
$full_path = (string)sprintf("/home/noahpaige/users/%s/%s", $username, $filename);

// print $filename; (Sanity Check)

if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo htmlentities("Invalid filename");
}  elseif( !preg_match('/^[\w_\-]+$/', $username) ){
	// Get the username and make sure it is valid

	echo htmlentities("Invalid username");

}  else{

	if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
		print htmlentities("Upload Success!");

	}else{
    	print htmlentities("Upload Failure");

	}
}

?>

<br><br>
<a href = "http://ec2-18-223-29-43.us-east-2.compute.amazonaws.com/~noahpaige/module2/FL19-Module2-Group-458011/userstart.php"> Return to User Home </a>
</html> 