


<?php 
session_start();
$filename = (string)$_GET['fname'];
// echo $filename; (Sanity Check)

// We need to make sure that the filename is in a valid format; if it's not, display an error and leave the script.
// To perform the check, we will use a regular expression.
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo htmlentities("Invalid filename");
	exit;
}

// Get the username and make sure that it is alphanumeric with limited other characters.
// You shouldn't allow usernames with unusual characters anyway, but it's always best to perform a sanity check
// since we will be concatenating the string to load files from the filesystem.
$username = $_SESSION['username'];
if( !preg_match('/^[\w_\-]+$/', $username) ){
	echo htmlentities("Invalid username");
	exit;
}

$full_path = (string)sprintf("/home/noahpaige/users/%s/%s", $username, $filename);

// echo $full_path; (Sanity Check)
// Now we need to get the MIME type (e.g., image/jpeg).  PHP provides a neat little interface to do this called finfo.
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($full_path);

// Finally, set the Content-Type header to the MIME type of the file, and display the file.

ob_clean();
$contentType = sprintf("Content-Type: %s", $mime);
header($contentType);
if (!file_exists ( $full_path)){
    echo htmlentities("File Does Not Exist");
	exit;
}

readfile($full_path);
?>


