<?php session_start(); ?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> ShareFile Userpage</title>
    <link rel= "stylesheet" type = "text/css" href = "userstart.css">
</head>

<body>
    <div>

    <p><u><b>Files Uploaded: </b></u> <br></p>
    <!-- List Files in UserDir -->
    </div>

    <ul>

    <?php 
        $username = $_SESSION["username"];
        $directory = (string) sprintf('/home/noahpaige/users/%s', $username); 
        // print $directory; 
        $filelist = scandir($directory); 
        foreach (scandir($directory) as $fl);
        echo "<li>$fl.";
    ?> 
    </ul>

    <!-- Form to View File -->
    <form name = "view" action = "ViewFile.php" method="GET">
        File Name: <input type = "text" name = "fname" /> 
        <input type = "submit" value = "View File" />
    </form>


    <!-- Form to Delete File -->
    <form name = "delete" action = "DeleteFile.php" method="GET">
        File Name: <input type = "text" name = "fname2" /> 
        <input type = "submit" value = "Delete File" />
    </form>


    <!-- Form to Upload File -->
    <form enctype="multipart/form-data" action="UploadFile.php" method="POST">
        <p>
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
            <label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
        </p>
        <p>
            <input type="submit" value="Upload File" />
        </p>
    </form>
    
</body>
</html>

