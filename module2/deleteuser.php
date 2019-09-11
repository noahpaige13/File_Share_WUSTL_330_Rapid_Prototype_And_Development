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
$deleteuser = (string)$_GET["deleteuser"];
$_SESSION["deleteuser"] = $deleteuser;

// If deleteuser var is not null find user and remove for users.txt and remove directory
if (isset($_GET["deleteuser"])){
    $file = fopen("/home/noahpaige/secret/users.txt","r");
    while(!feof($file)){
        $current_user_line = (string)fgets($file);

        $current_user_line = preg_replace('/\s+/', '', $current_user_line);
        $userexist = strcmp($deleteuser,$current_user_line);
        
        // If find user in users.txt remove user from directory and txt file
        if ($userexist == 0){
            $contents = (string)file_get_contents("/home/noahpaige/secret/users.txt");
    
            $contents = str_replace($current_user_line, '', $contents);
            file_put_contents("/home/noahpaige/secret/users.txt", $contents);
            // print $deleteuser;  (Sanity Check)

            rmdir("/home/noahpaige/users/$deleteuser");
            echo "User Deleted: $deleteuser";
            ?>

            
            
            <br><br>
            <a href = "http://ec2-18-223-29-43.us-east-2.compute.amazonaws.com/~noahpaige/module2/FL19-Module2-Group-458011/FileHomePage.html"> Return to Homepage </a>
            

<?php
            exit;
        }
        
    }

    
    echo htmlentities("User Does Not Exist");
    
}

?>
<br><br>
<a href = "http://ec2-18-223-29-43.us-east-2.compute.amazonaws.com/~noahpaige/module2/FL19-Module2-Group-458011/FileHomePage.html"> Return to Homepage </a>


</html>
