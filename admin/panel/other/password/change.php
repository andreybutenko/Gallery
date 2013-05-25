<?php
    include("../../../../variables.php");
    if(!$_COOKIE["password"] == md5(adminPass)) {
        header("Location: /admin?e=2");
        exit;
    }
    if($_POST["inputVerPass"] != adminPass) {
        header("Location: /admin/panel/other/password?e=1");
        exit;
    }

    $file = "../../../../variables.php";
    file_put_contents($file, str_replace('define("adminUser", "'.adminUser.'");', 'define("adminUser", "'.$_POST["inputUser"].'");', file_get_contents($file)));
    if($_POST["inputPass"] != str_repeat("*", strlen(adminPass))) {
        file_put_contents($file, str_replace('define("adminPass", "'.adminPass.'");', 'define("adminPass", "'.$_POST["inputPass"].'");', file_get_contents($file)));
        header("Location: /admin?e=3");
        exit;
    }
    header("Location: /admin/panel/other/password?e=2");
    exit;
?>