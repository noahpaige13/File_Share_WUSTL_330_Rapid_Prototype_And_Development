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
$deleteuser = (string)$_GET["deleteuser"];
$_SESSION["deleteuser"] = $deleteuser;

if (isset($_GET["deleteuser"])){
    $file = fopen("/home/noahpaige/secret/users.txt","r");
    while(!feof($file)){
        // $orignial = (string)fgets($file);
        // print $orignial;
        $current_user_line = (string)fgets($file);

        $current_user_line = preg_replace('/\s+/', '', $current_user_line);
        $userexist = strcmp($deleteuser,$current_user_line);
        
        if ($userexist == 0){
            $contents = file_get_contents("/home/noahpaige/secret/users.txt");
            // echo $original;
            // echo $current_user_line;
            // echo $contents;
            $contents = str_replace($current_user_line, '', $contents);
            file_put_contents("/home/noahpaige/secret/users.txt", $contents);
            // print $deleteuser;
            rmdir("/home/noahpaige/users/$deleteuser");
            echo "User Deleted: $deleteuser";
            ?>

            
            
            <br><br>
            <a href = "http://ec2-18-223-29-43.us-east-2.compute.amazonaws.com/~noahpaige/module2/FL19-Module2-Group-458011/FileHomePage.html"> Return to Homepage </a>
            

<?php
            exit;
        }
        
    }

    // file_put_contents("/home/noahpaige/secret/users.txt",$newuser);
    
    echo "User Does Not Exist";
    
}

?>
<br><br>
<a href = "http://ec2-18-223-29-43.us-east-2.compute.amazonaws.com/~noahpaige/module2/FL19-Module2-Group-458011/FileHomePage.html"> Return to Homepage </a>


</html>
