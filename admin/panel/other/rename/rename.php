<?php
    include("../../../../variables.php");
    if(!$_COOKIE["password"] == md5(adminPass)) {
        header("Location: /admin");
        exit;
    }

    $file = "../../../../variables.php";
    file_put_contents($file, str_replace('define("siteName", "'.siteName.'");', 'define("siteName", "'.$_GET["newName"].'");', file_get_contents($file)));
    header("Location: /admin/panel/other/rename?done=1");
?>