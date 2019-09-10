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
session_start();

$userexist = -1;
$username = (string)$_GET["username"];

$_SESSION["username"] = $username;

if (isset($_GET["username"])){

    $file = fopen("/home/noahpaige/secret/users.txt","r");

    while(!feof($file)){
        $current_user_line = (string)fgets($file);

        $current_user_line = preg_replace('/\s+/', '', $current_user_line);
        // echo strcmp($current_user_line, $username);
        $userexist = strcmp($username,$current_user_line);
        
        if ($userexist == 0){
            break;
        }
    }
    fclose($file);
}
if ($userexist == 0){
    header("Location: userstart.php");
    // List Files in UserDir
    // $directory = sprintf('/home/noahpaige/users/%s', $username);
    // $filelist = scandir($directory);
    // print sprintf('/home/noahpaige/users/%s', $username);
    // print $filelist;
    // scandir ( string $directory [ ,int $sorting_order = SCANDIR_SORT_ASCENDING [, resource $context ]] ) : array;  
} 
else{
    print "No user found!";
}


?>
<a href = "http://ec2-18-223-29-43.us-east-2.compute.amazonaws.com/~noahpaige/module2/FL19-Module2-Group-458011/userstart.php"> Return to Homepage </a>

</html>
