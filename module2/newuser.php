<?php
session_start();
$newuser = (string)$_GET["newuser"];

$_SESSION["newuser"] = $newuser;

if (isset($_GET["newuser"])){
    $file = fopen("/home/noahpaige/secret/users.txt","r");
    while(!feof($file)){
        $current_user_line = (string)fgets($file);

        $current_user_line = preg_replace('/\s+/', '', $current_user_line);
        $userexist = strcmp($username,$current_user_line);
        
        if ($userexist == 0){
            echo "User Already Exists"
            exit;
        }   
    }

    echo file_put_contents("/home/noahpaige/secret/users.txt",$newuser);
    mkdir("/home/noahpaige/users/$newuser");
    echo "User Created: $newuser";
}


?>