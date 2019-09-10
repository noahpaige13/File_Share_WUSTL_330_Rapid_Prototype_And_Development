<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Delete File</title>
</head>
<body>
	
</body>


<?php
session_start();

$filename2 = $_GET['fname2'];
$username = $_SESSION['username'];

// We need to make sure that the filename is in a valid format; if it's not, display an error and leave the script.
// To perform the check, we will use a regular expression.
if( !preg_match('/^[\w_\.\-]+$/', $filename2) ){
	echo "Invalid filename";
	
} elseif( !preg_match('/^[\w_\-]+$/', $username) ){

// Get the username and make sure that it is alphanumeric with limited other characters.
// $username = $_SESSION['username'];

	echo "Invalid username";
	
}
else{
	// Now we need to get the MIME type (e.g., image/jpeg). 
	$full_path = sprintf("/home/noahpaige/users/%s/%s", $username, $filename2);

	// Finally, set the Content-Type header to the MIME type of the file, and delete the file.
	header("Content-Type: ".$mime);
	if (file_exists ( $full_path)){
		unlink($full_path);
		echo "Deletion Success!";
	}
	else{
		echo "File Does Not Exist";
}


}



?>

<br><br>
<a href = "http://ec2-18-223-29-43.us-east-2.compute.amazonaws.com/~noahpaige/module2/FL19-Module2-Group-458011/userstart.php"> Return to User Home </a>
</html>