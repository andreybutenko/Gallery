<?php
    function rrmdir($dir) { 
        if (is_dir($dir)) { 
            $objects = scandir($dir); 
            foreach ($objects as $object) { 
                if ($object != "." && $object != "..") { 
                    if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
                } 
            } 
            reset($objects); 
            rmdir($dir); 
        } 
    }    

    include("../../../../variables.php");
    if(!$_COOKIE["password"] == md5(adminPass)) {
        header("Location: /admin");
        exit;
    }

    //delete folder
    $albumName = $_GET["albumName"];
    rrmdir("../../../../content/".$albumName);

    //total - 1
    $total = file_get_contents("../../../../content/total.txt");
    $total = $total - 1;
    file_put_contents("../../../../content/total.txt", $total);

    //remove from index
    $file = "../../../../content/albums.txt";
    file_put_contents($file, str_replace($albumName, "", file_get_contents($file)));

    header("Location: /admin/panel/edit?done=1");
?>