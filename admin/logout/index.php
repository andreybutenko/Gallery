<?php
    setcookie("password", "", time(), "/");
    header("Location: /");
    exit;
?>