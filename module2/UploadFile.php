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
$filename = basename($_FILES['uploadedfile']['name']);
$username = $_SESSION['username'];
$full_path = sprintf("/home/noahpaige/users/%s/%s", $username, $filename);

// print $filename;

if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid filename";
	// exit;
}  elseif( !preg_match('/^[\w_\-]+$/', $username) ){
	// Get the username and make sure it is valid
	echo "Invalid username";
	// exit;
}  else{

	if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
		// header("Location: userstart.php");
		print "Upload Success!";
		// exit;
	}else{
    	print "Upload Failure";
		// header("Location: upload_failure.html");
		// exit;
	}
}

?>

<br><br>
<a href = "http://ec2-18-223-29-43.us-east-2.compute.amazonaws.com/~noahpaige/module2/FL19-Module2-Group-458011/userstart.php"> Return to User Home </a>
</html>