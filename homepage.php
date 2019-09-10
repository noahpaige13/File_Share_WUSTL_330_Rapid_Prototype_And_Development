<?php
$userexist = -1;
$username = (string)$_GET["username"];
if (isset($_GET["username"])){

    $file = fopen("/home/noahpaige/secret/users.txt","r");

    while(!feof($file)){
        $current_user_line = (string)fgets($file);

        $current_user_line = preg_replace('/\s+/', '', $current_user_line);
        // echo strcmp($current_user_line, $username);
        $userexist = strcmp($username,$current_user_line);
        
        print $userexist;
        if ($userexist == 0){
            break;
        }
    }
    fclose($file);
}
if ($userexist == 0){
    header("Location: userpage.html");
}
else{
    print "No user found!";
}

#CHECK IF USER IN user.txt
?>