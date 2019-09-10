<?php
session_start();

// Get the filename and make sure it is valid
$filename = basename($_FILES['uploadedfile']['name']);
print $filename;

if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid filename";
	exit;
}

// Get the username and make sure it is valid
$username = $_SESSION['username'];
if( !preg_match('/^[\w_\-]+$/', $username) ){
	echo "Invalid username";
	exit;
}

$full_path = sprintf("/home/noahpaige/users/%s/%s", $username, $filename);

if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
    print "upload success!";
	// header("Location: upload_success.html");
	exit;
}else{
    print "upload failure";
	// header("Location: upload_failure.html");
	exit;
}


// List Files in UserDir
// $directory = sprintf('/home/noahpaige/users/%s', $username);
// $filelist = scandir ( string $directory [, int $sorting_order = SCANDIR_SORT_ASCENDING [, resource $context ]] ) : array;
// print $filelist
?>