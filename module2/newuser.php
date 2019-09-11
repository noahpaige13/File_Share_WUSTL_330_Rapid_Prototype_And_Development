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
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);


$userexist = (int)-1;
$newuser = (string)$_GET["newuser"];
$_SESSION["newuser"] = $newuser;

// If newuser isn't null add new user to uers.txt and create new user directory
if (isset($_GET["newuser"])){
    $file = fopen("/home/noahpaige/secret/users.txt","r");
    while(!feof($file)){
        $current_user_line = (string)fgets($file);

        $current_user_line = preg_replace('/\s+/', '', $current_user_line);
        $userexist = strcmp($newuser,$current_user_line);
        
        // Check edge case to make sure user doesn't already exist
        if ($userexist == 0){
            echo htmlentities("User Already Exists");
          
            ?>
            <br><br>
            <a href = "http://ec2-18-223-29-43.us-east-2.compute.amazonaws.com/~noahpaige/module2/FL19-Module2-Group-458011/FileHomePage.html"> Return to Homepage </a>
            

<?php
            exit;
        }
        
    }

    $handle = fopen("/home/noahpaige/secret/users.txt", 'a');
    fwrite($handle, "\n");
    fwrite($handle, $newuser);
    mkdir("/home/noahpaige/users/$newuser");
    echo "User Created: $newuser";
    file_exists("/home/noahpaige/users/$newuser");
}


?>
<br><br>
 <a href = "http://ec2-18-223-29-43.us-east-2.compute.amazonaws.com/~noahpaige/module2/FL19-Module2-Group-458011/FileHomePage.html"> Return to Homepage </a>



</html>