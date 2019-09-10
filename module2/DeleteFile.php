<?php
session_start();

$filename2 = $_GET['fname2'];

// We need to make sure that the filename is in a valid format; if it's not, display an error and leave the script.
// To perform the check, we will use a regular expression.
if( !preg_match('/^[\w_\.\-]+$/', $filename2) ){
	echo "Invalid filename";
	exit;
}

// Get the username and make sure that it is alphanumeric with limited other characters.
$username = $_SESSION['username'];
if( !preg_match('/^[\w_\-]+$/', $username) ){
	echo "Invalid username";
	exit;
}

// Now we need to get the MIME type (e.g., image/jpeg). 
$full_path = sprintf("/home/noahpaige/users/%s/%s", $username, $filename2);

// Finally, set the Content-Type header to the MIME type of the file, and delete the file.
header("Content-Type: ".$mime);
unlink($full_path);




?>