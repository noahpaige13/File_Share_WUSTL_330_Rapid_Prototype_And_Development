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
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$userexist = -1;
$newuser = (string)$_GET["newuser"];
$_SESSION["newuser"] = $newuser;

if (isset($_GET["newuser"])){
    $file = fopen("/home/noahpaige/secret/users.txt","r");
    while(!feof($file)){
        $current_user_line = (string)fgets($file);

        $current_user_line = preg_replace('/\s+/', '', $current_user_line);
        $userexist = strcmp($newuser,$current_user_line);
        
        if ($userexist == 0){
            echo "User Already Exists";
          
            ?>
            <br><br>
            <a href = "http://ec2-18-223-29-43.us-east-2.compute.amazonaws.com/~noahpaige/module2/FL19-Module2-Group-458011/FileHomePage.html"> Return to Homepage </a>
            

<?php
            break;
        }
        
    }

    file_put_contents("/home/noahpaige/secret/users.txt",$newuser);
    mkdir("/home/noahpaige/users/$newuser");
    echo "User Created: $newuser";
    file_exists("/home/noahpaige/users/$newuser");
}


?>
<br><br>
 <a href = "http://ec2-18-223-29-43.us-east-2.compute.amazonaws.com/~noahpaige/module2/FL19-Module2-Group-458011/FileHomePage.html"> Return to Homepage </a>



</html>