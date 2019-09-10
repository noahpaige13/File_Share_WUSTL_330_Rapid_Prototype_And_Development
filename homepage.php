<?php
#session_start();
$userexist = "no";
$username = (string)$_GET["username"];
#echo $username;
if (isset($_GET["username"])){

    #echo $username + "\n";
    $file = fopen("users.txt","r");

    while(!feof($file)){
        $u = (string)fgets($file);
        #echo $u;
        #echo "\n";
        #echo "</ul>\n";
        if ($username == $u){
            $userexist = "yes";
            header("Location: userpage.php");
            exit;
        }
    }
    fclose($file);
}
if ($userexist == "no"){
    #echo "Not Valid Username. Try Again";
}


#echo htmlentities($username);

#CHECK IF USER IN user.txt
?>