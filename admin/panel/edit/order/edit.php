<?php
    include("../../../../variables.php");
    if(!$_COOKIE["password"] == md5(adminPass)) {
        header("Location: /admin");
        exit;
    }

    $albumName = $_GET["albumName"];
    $newCss = $_GET["cssNew"];
    file_put_contents("../../../../content/".$albumName."/indexed.txt", $newCss);
    header("Location: /admin/panel/edit?done=1");
?>