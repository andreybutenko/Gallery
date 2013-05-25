<?php 
    include("../variables.php");
    if (($_POST["inputUser"] == adminUser) && ($_POST["inputPass"] == adminPass)) {
        setcookie("password", md5(adminPass), time()+3600, "/");  /* expire in 1 hour */
        header("Location: /admin/panel");
    }
    else {
        header("Location: /admin?e=1");
    }
?>