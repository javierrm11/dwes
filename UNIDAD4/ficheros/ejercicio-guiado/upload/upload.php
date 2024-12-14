<?php


define("DIRUPLOAD","upload/");
define("MAXSIZE",200000);
$allowedExts = array("gif", "jpeg","jpg","png");
$allowedFormart = array("image/gif", "image/jpeg", "image/jpg", "image/png");


$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if(($_FILES["file"]["size"] < MAXSIZE) && 
    in_array($_FILES["file"]["type"], $allowedFormart) && 
    in_array($extension, $allowedExts)){

        if(($_FILES["file"]["error"]) > 0){
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/>";
        } else{
            $filename = $_FILES["file"]["name"];
            $filename = uniqid().".".pathinfo($filename, PATHINFO_EXTENSION);

            echo "Upload: " . $_FILES["file"]["name"] . "<br/>";
            echo "Type: " . $_FILES["file"]["type"] . "<br/>";
            echo "Size: " . $_FILES["file"]["size"] . "<br/>";
            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br/>";

            if(file_exists(DIRUPLOAD .$filename)){
                echo $_FILES["file"]["name"] . "Ya existe";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], DIRUPLOAD . $filename);
                echo "Stored in: " . DIRUPLOAD . $filename;
            }

            echo "<br/>";
            echo "<a href=\"".$_SERVER["HTTP_REFERER"]."\>Volver</a>";
            // mejor
            echo '<a href= "javascript:history.back()">Volver</a>';
        }
        
    } else {
        echo "Invalid file";
    }