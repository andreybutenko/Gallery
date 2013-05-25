<?php
    include("../../../../variables.php");
    if(!$_COOKIE["password"] == md5(adminPass)) {
        header("Location: /admin");
        exit;
    }

    if($_GET["yupOrNope"] == "on") {
        $file = "../../../../variables.php";
        file_put_contents($file, str_replace('define("fadeHome", "nope");', 'define("fadeHome", "yup");', file_get_contents($file)));
    }
    else {
        $file = "../../../../variables.php";
        file_put_contents($file, str_replace('define("fadeHome", "yup");', 'define("fadeHome", "nope");', file_get_contents($file)));
    }
    file_put_contents("../../../../background.txt", $_GET["newName"]);
    header("Location: /admin/panel/other/home?done=1");
?>