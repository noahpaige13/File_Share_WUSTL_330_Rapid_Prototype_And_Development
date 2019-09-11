<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>

<?php 
// Check Errors
session_start();
session_regenerate_id(true); 
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);


$userexist = (int)-1;
$username = (string)$_GET["username"];

$_SESSION["username"] = $username;

// If username isn't null find user directory and go to userpage
if (isset($_GET["username"])){

    $file = fopen("/home/noahpaige/secret/users.txt","r");

    while(!feof($file)){
        $current_user_line = (string)fgets($file);

        $current_user_line = preg_replace('/\s+/', '', $current_user_line);
        
        $userexist = strcmp($username,$current_user_line);
        
        if ($userexist == 0){
            break;
        }
    }
    fclose($file);
}
if ($userexist == 0){
    header("Location: userstart.php");
     
} 
else{
    print "No user found!";
}


?>
<br><br>
<a href = "http://ec2-18-223-29-43.us-east-2.compute.amazonaws.com/~noahpaige/module2/FL19-Module2-Group-458011/FileHomePage.html"> Return to Homepage </a>

</html>
